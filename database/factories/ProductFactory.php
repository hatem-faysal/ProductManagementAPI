<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'name' => $this->faker->word,
        'description' => fake()->paragraph(),
        'prices' => $this->faker->randomFloat(2, 10, 100),
        'stock_quantity' => $this->faker->numberBetween(1, 100),
        'created_at' => now(),
        'updated_at' => now(),
        ];
    }
}
