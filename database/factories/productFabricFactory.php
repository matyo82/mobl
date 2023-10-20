<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFabricFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fabric_name' => $this->faker->name(),
            'price_increase' => rand(1000, 9999),
			'product_id'=> rand(1, 30),
            'status' => rand(0, 1)
        ];
    }
}
