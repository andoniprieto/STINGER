<?php

namespace Database\Factories;

use App\Models\Ekitaldia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ekitaldia>
 */
class EkitaldiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'izenburua' => fake()->sentence(3),
            'deskribapena' => fake()->text(200),
            'prezioa' => fake()->randomFloat(2, 5, 150),
        ];
    }
}
