<?php

namespace Database\Seeders;

use App\Models\Ekitaldia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EkitaldiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ekitaldia::factory()->create([
            'izenburua' => 'Bertso saioa',
            'deskribapena'=>'Udazkeneko jaialdia',
            'kategoria' => 'Bertsolaritza',
            'prezioa' => 10,
        ]);

        Ekitaldia::factory()->create([
            'izenburua' => 'Antzerkia',
            'deskribapena'=>'Etxeko giltzak',
            'kategoria'=>'Antzerkia',
            'prezioa' => 14,
        ]);

        Ekitaldia::factory()->create([
            'izenburua' => 'Jazz gaua',
            'deskribapena'=>'Hirukote akustikoa',
            'kategoria'=>'Musika',
            'prezioa' => 12,
        ]);

        Ekitaldia::factory()->create([
            'izenburua' => 'Haurrentzako antzerkia',
            'deskribapena'=>'Ilargiaren bidaia',
            'kategoria'=>'Haurrak',
            'prezioa' => 6,
        ]);

        Ekitaldia::factory()->create([
            'izenburua' => 'Dantza garaikidea',
            'deskribapena'=>'Arnasa',
            'kategoria'=>'Dantza',
            'prezioa' => 15,
        ]);

        Ekitaldia::factory()->create([
            'izenburua' => 'Zinema forum',
            'deskribapena'=>'Euskal film laburrak',
            'kategoria'=>'Zinema',
            'prezioa' => 5,
        ]);
    }
}
