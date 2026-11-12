<?php

namespace Database\Seeders;

use App\Models\Ekitaldia;
use App\Models\Kategoria;
use Illuminate\Database\Seeder;

class KategoriaSeeder extends Seeder
{
    /**
     * Ekitaldien 'kategoria' testu-zutabetik kategoriak sortu eta lotu.
     */
    public function run(): void
    {
        Ekitaldia::query()->pluck('kategoria')->unique()->each(function (string $izena) {
            $kategoria = Kategoria::firstOrCreate(['izena' => $izena]);

            Ekitaldia::where('kategoria', $izena)->update(['kategoria_id' => $kategoria->id]);
        });
    }
}
