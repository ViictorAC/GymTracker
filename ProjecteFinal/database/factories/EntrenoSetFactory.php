<?php

namespace Database\Factories;

use App\Models\Entreno;
use App\Models\Ejercicio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EntrenoSet>
 */
class EntrenoSetFactory extends Factory
{
    public function definition(): array
    {
        return [
            'entreno_id'   => Entreno::factory(),
            'ejercicio_id' => Ejercicio::all()->random()->id ?? 1,
            'set_numero'   => $this->faker->numberBetween(1, 5),
            'peso'         => $this->faker->randomFloat(1, 20, 200),
            'reps'         => $this->faker->numberBetween(4, 15),
        ];
    }
}
