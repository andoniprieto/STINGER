<?php

it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertOk()
        ->assertSee(route('ekitaldia'))
        ->assertSee('Ver ekitaldia');
});

it('shows the event page', function () {
    $this->get(route('ekitaldia'))
        ->assertOk()
        ->assertSee('Bertso saioa: udazkeneko jaialdia');
});
