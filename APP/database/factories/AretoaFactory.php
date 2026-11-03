<?php

namespace Database\Factories;

use App\Models\Aretoa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Aretoa>
 */
class AretoaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'izena' => fake()->unique()->words(2, true),
        ];
    }
}
