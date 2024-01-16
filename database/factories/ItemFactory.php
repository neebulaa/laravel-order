<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->sentence(1),
            "price" => fake()->randomFloat(2, 10, 1000),
            "type" => ['goods', 'service'][random_int(0, 1)],
            "stock" => random_int(0, 20)
        ];
    }
}
