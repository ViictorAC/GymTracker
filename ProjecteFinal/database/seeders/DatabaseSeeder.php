<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            MusculoSeeder::class,
            EjercicioSeeder::class,
        ]);

        // Usuari de demo per a proves
        User::factory()->create([
            'name'  => 'Demo User',
            'email' => 'demo@gymtracker.test',
        ]);
    }
}
