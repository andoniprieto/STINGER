<?php

namespace Database\Factories;

use App\Models\Ekitaldia;
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
            'user_id' => User::factory(),
            'ekitaldia_id' => Ekitaldia::factory(),
            'kopurua' => fake()->numberBetween(1, 5),
            'prezio_totala' => fake()->randomFloat(2, 5, 150),
            'kodigoa' => fake()->text(5),
        ];
    }
}
