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
        $ekitaldiak = Ekitaldia::factory()->count(10)->create();

        $kategoriak = Kategoria::all();

        foreach ($ekitaldiak as $ekitaldia) {
            $ekitaldia->kategoriak()->attach(
                $kategoriak->random(
                    rand(1, min(3, $kategoriak->count()))
                )->modelKeys()
            );
        }

        $ekitaldia = Ekitaldia::factory()->create([
            'izenburua' => 'Stinger Live'
        ]);
        $ekitaldia->kategoriak()->attach(
            $kategoriak->random(
                rand(1, min(3, $kategoriak->count()))
            )->modelKeys()
        );
    }
}
