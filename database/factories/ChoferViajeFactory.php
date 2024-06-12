<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChoferViaje>
 */
class ChoferViajeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idChofer' => 1,
            'idViaje'=>1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
