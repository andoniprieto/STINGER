<?php

namespace Database\Seeders;

use App\Enums\Rola;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@antzokia.eus',
            'password'=> "admin1234",
            'rola' => Rola::Admin,
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@antzokia.eus',
            'rola' => Rola::User,
        ]);
    }
}
