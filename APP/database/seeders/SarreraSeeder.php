<?php

namespace Database\Seeders;

use App\Models\Ekitaldia;
use App\Models\Eserlekua;
use App\Models\Saioa;
use App\Models\Sarrera;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'user@example.com')
            ->firstOrFail();

        $ekitaldia = Ekitaldia::findOrFail(2);

        $kopurua = 2;
        $prezioa = $ekitaldia->prezioa;
        $prezio_totala = $kopurua * $prezioa;

        Sarrera::factory()->create([
            'user_id' => $user->id,
            'ekitaldia_id' => $ekitaldia->id,
            'kopurua' => $kopurua,
            'prezio_totala' => $prezio_totala,
        ]);
    }
}
