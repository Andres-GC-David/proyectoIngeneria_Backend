<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EstadoConfirmacion>
 */
class EstadoConfirmacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'estado' => 'En Progreso',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
