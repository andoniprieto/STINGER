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
        $aretoa = Aretoa::where('izena', 'Areto nagusia')->firstOrFail();
        $ekitaldia = Ekitaldia::findOrFail(1);

        Saioa::factory()->count(3)->create([
            'aretoa_id' => $aretoa->id,
            'ekitaldia_id' => $ekitaldia->id,
        ]);


        $aretoa = Aretoa::where('izena', 'Areto ertaina')->firstOrFail();
        $ekitaldia = Ekitaldia::findOrFail(2);

        Saioa::factory()->count(1)->create([
            'aretoa_id' => $aretoa->id,
            'ekitaldia_id' => $ekitaldia->id,
        ]);
    }
}
