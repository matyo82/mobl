<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                              'order_id' => 1,
                              'product_id' => rand(1 , 5),
							  
                              'number' => rand(1,5),
                              'final_product_price' => rand(1000 , 5000),
                              'final_total_price' => rand(20000 , 50000),
        ];
    }
}
