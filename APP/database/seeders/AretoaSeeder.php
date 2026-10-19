<?php

namespace Database\Seeders;

use App\Models\Aretoa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AretoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aretoa::factory()->count(5)->create();

        Aretoa::factory()->create([
            'izena' => 'Stinger Nagusia',
        ]);
    }
}
