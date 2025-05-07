<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarea>
 */
class TareaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'        => $this->faker->sentence,
            'descripcion'   => $this->faker->paragraph,
            'fecha_limite' => $this->faker->dateTimeBetween('now', '+1 month'),
            'user_id'       => User::inRandomOrder()->first()?->id ?? User::factory(),
        ];
    }
}
