<?php

namespace Database\Factories;

use App\Models\Aretoa;
use App\Models\Eserlekua;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Eserlekua>
 */
class EserlekuaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'aretoa_id' => Aretoa::factory(),
            'ilara' => fake()->numberBetween(1, 30),
            'zenbakia' => fake()->numberBetween(1, 40),
        ];
    }
}
