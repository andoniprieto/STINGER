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
        Ekitaldia::factory()->count(10)->create();
    }
}
