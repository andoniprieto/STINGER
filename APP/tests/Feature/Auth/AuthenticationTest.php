<?php

use App\Enums\Rola;
use App\Models\User;

test('login screen can be rendered', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $this->post('/login', [
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
