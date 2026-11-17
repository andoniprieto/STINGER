<?php

use App\Enums\Rola;
use App\Models\User;

beforeEach(function () {
    $this->admin = User::factory()->create(['rola' => Rola::Admin, 'name' => 'Admin', 'telefonoa' => '600000001']);
});

test('ikusi: zerrendak erabiltzaileak eta ekintzak erakusten ditu', function () {
    User::factory()->create(['name' => 'Ane', 'telefonoa' => '600000002']);

    $this->actingAs($this->admin)
        ->get('/admin/erabiltzaileak')
        ->assertOk()
        ->assertSee('Erabiltzaileen kudeaketa')
        ->assertSee('Ane')
        ->assertSee('Ikusi')
        ->assertSee('Editatu')
        ->assertSee('Ezabatu');
});

test('ikusi: erabiltzaile baten fitxa erakusten du', function () {
    $ane = User::factory()->create(['name' => 'Ane', 'abizena' => 'Etxeberria', 'telefonoa' => '600000002']);

    $this->actingAs($this->admin)
        ->get("/admin/erabiltzaileak/{$ane->id}")
        ->assertOk()
        ->assertSee('Ane Etxeberria')
        ->assertSee('Erabiltzaile honek ez du sarrerarik erosi oraindik.');
});

test('sortu: erabiltzaile berria gordetzen du', function () {
    $this->actingAs($this->admin)
        ->post('/admin/erabiltzaileak', [
            'name' => 'Jon',
            'abizena' => 'Agirre',
            'email' => 'jon@adibidea.eus',
            'telefonoa' => '611111111',
            'password' => 'pasahitza123',
            'password_confirmation' => 'pasahitza123',
            'rola' => 'user',
        ])
        ->assertRedirect('/admin/erabiltzaileak');

    expect(User::where('email', 'jon@adibidea.eus')->exists())->toBeTrue();
});

test('editatu: datuak eguneratzen ditu pasahitza aldatu gabe', function () {
    $ane = User::factory()->create(['telefonoa' => '600000002']);
    $pasahitzZaharra = $ane->password;

    $this->actingAs($this->admin)
        ->put("/admin/erabiltzaileak/{$ane->id}", [
            'name' => 'Ane berria',
            'abizena' => 'Etxeberria',
            'email' => $ane->email,
            'telefonoa' => '600000002',
            'rola' => 'admin',
        ])
        ->assertRedirect('/admin/erabiltzaileak');

    $ane->refresh();
    expect($ane->name)->toBe('Ane berria')
        ->and($ane->rola)->toBe(Rola::Admin)
        ->and($ane->password)->toBe($pasahitzZaharra);
});

test('ezabatu: erabiltzailea ezabatzen du', function () {
    $ane = User::factory()->create(['telefonoa' => '600000002']);

    $this->actingAs($this->admin)
        ->delete("/admin/erabiltzaileak/{$ane->id}")
        ->assertRedirect('/admin/erabiltzaileak');

    expect(User::find($ane->id))->toBeNull();
});

test('ezabatu: ezin du bere burua ezabatu', function () {
    $this->actingAs($this->admin)
        ->delete("/admin/erabiltzaileak/{$this->admin->id}")
        ->assertRedirect('/admin/erabiltzaileak')
        ->assertSessionHas('error');

    expect(User::find($this->admin->id))->not->toBeNull();
});
