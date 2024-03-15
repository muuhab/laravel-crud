<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => fake()->name(),
            'price'=> fake()->numberBetween(0,10000),
            'quantity'=> fake()->numberBetween(1,9999),
            'description'=> fake()->paragraph(5),
            'image'=> fake()->imageUrl(),
        ];
    }
}
