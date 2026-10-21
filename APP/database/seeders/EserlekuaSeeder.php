<?php

namespace Database\Seeders;

use App\Models\Aretoa;
use App\Models\Eserlekua;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EserlekuaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aretoa = Aretoa::where('izena', 'Areto nagusia')->firstOrFail();

        for ($ilara = 1; $ilara <= 7; $ilara++) {
            for ($zenbakia = 1; $zenbakia <= 10; $zenbakia++) {
                Eserlekua::factory()->create([
                    'aretoa_id' => $aretoa->id,
                    'ilara' => $ilara,
                    'zenbakia' => $zenbakia,
                ]);
            }
        }


        $aretoa = Aretoa::where('izena', 'Areto ertaina')->firstOrFail();

        for ($ilara = 1; $ilara <= 5; $ilara++) {
            for ($zenbakia = 1; $zenbakia <= 7; $zenbakia++) {
                Eserlekua::factory()->create([
                    'aretoa_id' => $aretoa->id,
                    'ilara' => $ilara,
                    'zenbakia' => $zenbakia,
                ]);
            }
        }


        $aretoa = Aretoa::where('izena', 'Areto txikia')->firstOrFail();

        for ($ilara = 1; $ilara <= 3; $ilara++) {
            for ($zenbakia = 1; $zenbakia <= 5; $zenbakia++) {
                Eserlekua::factory()->create([
                    'aretoa_id' => $aretoa->id,
                    'ilara' => $ilara,
                    'zenbakia' => $zenbakia,
                ]);
            }
        }
    }
}
