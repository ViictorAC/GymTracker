<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entreno>
 */
class EntrenoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id'    => User::factory(),
            'rutina_id'  => null,
            'fecha'      => $this->faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
            'comentario' => $this->faker->optional()->sentence(),
        ];
    }
}
