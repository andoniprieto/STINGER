<?php

it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertOk();
});

it('shows the event page', function () {
    $this->get(route('ekitaldia'))
        ->assertOk()
        ->assertSee('Bertso saioa: udazkeneko jaialdia');
});
