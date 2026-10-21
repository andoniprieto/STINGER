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
        Aretoa::factory()->create([
            'izena' => 'Areto nagusia',
        ]);

        Aretoa::factory()->create([
            'izena' => 'Areto ertaina',
        ]);

        Aretoa::factory()->create([
            'izena' => 'Areto txikia',
        ]);
    }
}
