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
            'izenburua' => 'Bertso saioa: udazkeneko jaialdia',
            'deskribapena' => 'Bertsolari gazte eta beteranoak oholtza berean, gai-jartzailearen erronkei bat-batean erantzuten. Arratsalde bat hitzaren eta doinuaren inguruan.',
            'kategoria' => 'Bertsolaritza',
            'prezioa' => 10,
        ]);

        Ekitaldia::factory()->create([
            'izenburua' => 'Antzerkia: Etxeko giltzak',
            'deskribapena' => 'Familia bat, etxe zahar bat eta inork ireki nahi ez duen atea. Umorez eta samurtasunez betetako komedia dramatikoa.',
            'kategoria' => 'Antzerkia',
            'prezioa' => 14,
        ]);

        Ekitaldia::factory()->create([
            'izenburua' => 'Jazz gaua: hirukote akustikoa',
            'deskribapena' => 'Pianoa, kontrabaxua eta bateria. Estandar klasikoak eta konposizio propioak giro hurbil batean.',
            'kategoria' => 'Musika',
            'prezioa' => 12,
            'aretoa' => 'Areto txikia',
        ]);

        Ekitaldia::factory()->create([
            'izenburua' => 'Haurrentzako antzerkia: Ilargiaren bidaia',
            'deskribapena' => 'Txotxongiloz eta argiz egindako abentura bat 4 urtetik gorako haurrentzat eta haien familientzat.',
            'kategoria' => 'Haurrak',
            'prezioa' => 6,
        ]);

        Ekitaldia::factory()->create([
            'izenburua' => 'Dantza garaikidea: Arnasa',
            'deskribapena' => 'Bost dantzarik gorputzaren eta arnasaren arteko lotura aztertzen dute, musika elektroniko zuzenean lagun.',
            'kategoria' => 'Dantza',
            'prezioa' => 15,
        ]);

        Ekitaldia::factory()->create([
            'izenburua' => 'Zinema forum: euskal film laburrak',
            'deskribapena' => 'Azken urteetako euskal film labur onenen emanaldia, eta ondoren solasaldia zuzendariekin.',
            'kategoria' => 'Zinema',
            'prezioa' => 5,
            'aretoa' => 'Areto txikia',
        ]);
    }
}
