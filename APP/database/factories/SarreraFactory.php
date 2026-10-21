<?php

namespace Database\Factories;

use App\Models\Eserlekua;
use App\Models\Saioa;
use App\Models\Sarrera;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sarrera>
 */
class SarreraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'erabiltzailea_id' => User::factory(),
            'eserlekua_id' => Eserlekua::factory(),
            'saioa_id' => Saioa::factory(),
            'prezioa' => fake()->randomFloat(2, 5, 150),
            'erosketa_data' => now()->toDateString(),
            'egoera' => 'Baliozkoa',
        ];
    }
}
