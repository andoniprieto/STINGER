<?php

namespace Database\Seeders;

use App\Models\Ekitaldia;
use App\Models\Kategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EkitaldiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ekitaldia = Ekitaldia::factory()->create([
            'izenburua' => 'Bertso saioa: udazkeneko jaialdia',
            'prezioa' => 10,
        ]);

        $ekitaldia->kategoriak()->attach([
            Kategoria::where('izena', 'Bertsolaritza')->firstOrFail()->id,
            Kategoria::where('izena', 'Musika')->firstOrFail()->id,
        ]);


        $ekitaldia = Ekitaldia::factory()->create([
            'izenburua' => 'Antzerkia: Etxeko giltzak',
            'prezioa' => 14,
        ]);

        $ekitaldia->kategoriak()->attach([
            Kategoria::where('izena', 'Antzerkia')->firstOrFail()->id,
        ]);


        $ekitaldia = Ekitaldia::factory()->create([
            'izenburua' => 'Jazz gaua: hirukote akustikoa',
            'prezioa' => 12,
        ]);

        $ekitaldia->kategoriak()->attach([
            Kategoria::where('izena', 'Musika')->firstOrFail()->id,
        ]);


        $ekitaldia = Ekitaldia::factory()->create([
            'izenburua' => 'Haurrentzako antzerkia: Ilargiaren bidaia',
            'prezioa' => 6,
        ]);

        $ekitaldia->kategoriak()->attach([
            Kategoria::where('izena', 'Antzerkia')->firstOrFail()->id,
            Kategoria::where('izena', 'Haurrak')->firstOrFail()->id,
        ]);


        $ekitaldia = Ekitaldia::factory()->create([
            'izenburua' => 'Dantza garaikidea: Arnasa',
            'prezioa' => 15,
        ]);

        $ekitaldia->kategoriak()->attach([
            Kategoria::where('izena', 'Dantza')->firstOrFail()->id,
        ]);


        $ekitaldia = Ekitaldia::factory()->create([
            'izenburua' => 'Zinema forum: euskal film laburrak',
            'prezioa' => 5,
        ]);

        $ekitaldia->kategoriak()->attach([
            Kategoria::where('izena', 'Zinema')->firstOrFail()->id,
        ]);

    }
}
