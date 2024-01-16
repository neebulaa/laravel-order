<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buyer>
 */
class BuyerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->unique()->name(),
            "password" => bcrypt('12345'),
            "email" => fake()->unique()->safeEmail(),
            "is_admin" => random_int(0, 1)
        ];
    }
}
