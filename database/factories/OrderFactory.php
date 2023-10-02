<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                              'user_id' => 1,
                              'address_id' => 1,
                              'order_final_amount' => rand(10000 , 50000),
                              'order_discount_amount' => rand(1000 , 5000),
                              'order_discount_percentage' => 50,
                              'order_status' => 0,
        ];
    }
}
