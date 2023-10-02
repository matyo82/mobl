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
                              'name' => 'product-test-'.rand(1 , 900000),
                              'introduction' => fake()->paragraph(),
                              'price' => rand(100000 , 900000),
                              'guarantee' => 1,
                              'marketable' => rand(0 , 1),
                              'category_id' => rand(1 , 5),
                              'image' => 'public/images/fakes/cart.avif',
                              'status' => 1,     
			    ];
    }
}
