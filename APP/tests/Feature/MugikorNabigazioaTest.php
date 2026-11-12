<?php

use App\Enums\Rola;
use App\Models\User;

test('bisitariak beheko barran Ekitaldiak, Sarrerak eta Kontua ikusten ditu, Kudeaketa ez', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('mugikor-nabigazioa', false)
        ->assertSee('Kontua')
        ->assertDontSee('>Kudeaketa<', false);
});

test('administratzaileak beheko barran Kudeaketa eta Profila ikusten ditu', function () {
    $admin = User::factory()->create(['rola' => Rola::Admin]);

    $this->actingAs($admin)->get('/')
        ->assertOk()
        ->assertSee('<span>Kudeaketa</span>', false)
        ->assertSee('<span>Profila</span>', false);
});

test('uneko atalaren fitxa aktibo gisa markatzen da', function () {
    $admin = User::factory()->create(['rola' => Rola::Admin]);

    $html = $this->actingAs($admin)->get('/admin/erabiltzaileak')->getContent();

    expect($html)->toMatch('#class="mugikor-fitxa aktiboa"[^>]*href|href="[^"]*/admin/ekitaldiak" class="mugikor-fitxa aktiboa"#');
});

test('profila: bisitariari saioa hasteko aukerak erakusten dizkio', function () {
    $this->get('/profila')
        ->assertOk()
        ->assertSee('Kaixo!')
        ->assertSee(route('login'))
        ->assertSee(route('register'));
});

test('profila: erabiltzailearen datuak eta saioa ixteko botoia erakusten ditu', function () {
    $user = User::factory()->create(['name' => 'Ane', 'abizena' => 'Etxeberria']);

    $this->actingAs($user)->get('/profila')
        ->assertOk()
        ->assertSee('Ane Etxeberria')
        ->assertSee('Nire sarrerak')
        ->assertSee('Saioa itxi')
        ->assertDontSee('Erabiltzaileen kudeaketa');
});
