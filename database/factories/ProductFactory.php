<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

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
                              'category_id' => ProductCategory::factory(),
                              'image' => 'images/products/test.jpg',
                              'status' => 1,     
			    ];
    }
}
