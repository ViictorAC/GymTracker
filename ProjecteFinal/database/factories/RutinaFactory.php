<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rutina>
 */
class RutinaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id'     => User::factory(),
            'nombre'      => $this->faker->words(3, true),
            'descripcion' => $this->faker->optional()->sentence(),
            'dia_semana'  => $this->faker->optional()->numberBetween(1, 7),
        ];
    }
}
