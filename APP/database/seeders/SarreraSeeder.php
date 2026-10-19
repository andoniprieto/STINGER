<?php

namespace Database\Seeders;

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
        $erabiltzailea = User::where('email', 'user@example.com')
            ->firstOrFail();

        $saioa = Saioa::whereHas('ekitaldia', function ($query) {
            $query->where('izenburua', 'Stinger Live');
        })->firstOrFail();

        $eserlekua = Eserlekua::where('aretoa_id', $saioa->aretoa_id)
            ->where('ilara', 1)
            ->where('zenbakia', 1)
            ->firstOrFail();

        Sarrera::factory()->create([
            'erabiltzailea_id' => $erabiltzailea->id,
            'eserlekua_id' => $eserlekua->id,
            'saioa_id' => $saioa->id,
            'prezioa' => $saioa->ekitaldia->prezioa,
            'erosketa_data' => now()->toDateString(),
            'egoera' => 'Baliozkoa',
        ]);
    }
}
