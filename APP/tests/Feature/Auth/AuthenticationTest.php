<?php

use App\Enums\Rola;
use App\Models\User;

test('login screen can be rendered', function () {
    $this->get('/saioa-hasi')
        ->assertOk()
        ->assertSee('Saioa hasi')
        ->assertSee('action="'.url('/saioa-hasi').'"', false);
});

test('old login url redirects to the stinger login', function () {
    $this->get('/login')->assertRedirect('/saioa-hasi');
});

test('guests are sent to the stinger login when a page needs authentication', function () {
    $this->get('/admin/erabiltzaileak')->assertRedirect('/saioa-hasi');
});

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    $response = $this->post('/saioa-hasi', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect('/');
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $this->post('/saioa-hasi', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});

test('users can logout', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/logout');

    $this->assertGuest();
    $response->assertRedirect('/');
});

test('administrators can access user management from the dashboard', function () {
    $admin = User::factory()->create(['rola' => Rola::Admin]);

    $this->actingAs($admin)
        ->get('/dashboard')
        ->assertOk()
        ->assertSee(route('front-end.admin.erabiltzaileak.index'));
});

test('regular users do not see administrator management links on the dashboard', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/dashboard')
        ->assertOk()
        ->assertDontSee(route('front-end.admin.erabiltzaileak.index'));
});

test('administrators see user management in the front-end navigation', function () {
    $admin = User::factory()->create(['rola' => Rola::Admin]);

    $this->actingAs($admin)
        ->get('/')
        ->assertOk()
        ->assertSee('href="'.url('/admin/erabiltzaileak').'"', false);
});
