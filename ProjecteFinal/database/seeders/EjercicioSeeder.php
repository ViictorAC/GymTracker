<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ejercicio;
use App\Models\Musculo;

class EjercicioSeeder extends Seeder
{
    public function run(): void
    {
        $ejercicios = [
            'Press banca'         => ['Pecho', 'Tríceps', 'Hombros'],
            'Press inclinado'     => ['Pecho', 'Hombros'],
            'Aperturas'           => ['Pecho'],
            'Dominadas'           => ['Espalda', 'Bíceps'],
            'Remo con barra'      => ['Espalda', 'Bíceps', 'Trapecio'],
            'Jalón al pecho'      => ['Espalda', 'Bíceps'],
            'Press militar'       => ['Hombros', 'Tríceps'],
            'Elevaciones laterales' => ['Hombros'],
            'Curl bíceps'         => ['Bíceps'],
            'Curl martillo'       => ['Bíceps', 'Antebrazos'],
            'Fondos'              => ['Tríceps', 'Pecho'],
            'Press francés'       => ['Tríceps'],
            'Sentadilla'          => ['Cuádriceps', 'Glúteos', 'Isquiotibiales'],
            'Prensa'              => ['Cuádriceps', 'Glúteos'],
            'Peso muerto'         => ['Isquiotibiales', 'Glúteos', 'Espalda'],
            'Zancadas'            => ['Cuádriceps', 'Glúteos'],
            'Curl femoral'        => ['Isquiotibiales'],
            'Hip thrust'          => ['Glúteos'],
            'Gemelos de pie'      => ['Gemelos'],
            'Plancha'             => ['Abdominales'],
            'Crunch'              => ['Abdominales'],
        ];

        foreach ($ejercicios as $nombre => $musculos) {
            $ejercicio = Ejercicio::create(['nombre' => $nombre]);
            $ids = Musculo::whereIn('nombre', $musculos)->pluck('id');
            $ejercicio->musculos()->attach($ids);
        }
    }
}