<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                              'postal_code' =>12345678 ,
                              'address' => 'خیابان x-کوچه y',
                              'no' => 11,
                              'unit' => 1,
                              'recipient_first_name' => fake()->name(),
                              'recipient_last_name' => fake()->name(),
                              'mobile' => '09309999999',
                              'status' => 1,
        ];
    }
}
