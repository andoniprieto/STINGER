<?php

namespace Database\Seeders;

use App\Models\Aretoa;
use App\Models\Ekitaldia;
use App\Models\Saioa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaioaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aretoa = Aretoa::where('izena', 'Stinger Nagusia')->firstOrFail();
        $ekitaldia = Ekitaldia::where('izenburua', 'Stinger Live')->firstOrFail();

        Saioa::factory()->count(3)->create([
            'aretoa_id' => $aretoa->id,
            'ekitaldia_id' => $ekitaldia->id,
        ]);
    }
}
