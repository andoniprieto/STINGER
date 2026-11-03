<?php

namespace Database\Factories;

use App\Models\Aretoa;
use App\Models\Ekitaldia;
use App\Models\Saioa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Saioa>
 */
class SaioaFactory extends Factory
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
            'ekitaldia_id' => Ekitaldia::factory(),
            'data' => fake()->dateTimeBetween('now', '+6 months')
                ->format('Y-m-d'),
            'ordua' => fake()->time('H:i:s'),
        ];
    }
}
