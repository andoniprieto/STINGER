<?php

test('registration screen can be rendered', function () {
    $this->get('/erregistratu')
        ->assertOk()
        ->assertSee('Kontua sortu')
        ->assertSee('name="abizena"', false)
        ->assertSee('name="telefonoa"', false);
});

test('new users can register', function () {
    $response = $this->post('/erregistratu', [
        'name' => 'Test User',
        'abizena' => 'User',
        'telefonoa' => '123456789',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect('/');
    $this->assertDatabaseHas('users', [
        'email' => 'test@example.com',
        'abizena' => 'User',
        'telefonoa' => '123456789',
    ]);
});

test('registration requires the user surname and phone number', function () {
    $this->from('/erregistratu')
        ->post('/erregistratu', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ])
        ->assertRedirect('/erregistratu')
        ->assertSessionHasErrors(['abizena', 'telefonoa']);

    $this->assertGuest();
    $this->assertDatabaseMissing('users', ['email' => 'test@example.com']);
});

test('old register url redirects to the stinger register', function () {
    $this->get('/register')->assertRedirect('/erregistratu');
});
