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
                              'city' => 'تهران',
                              'province' => 'تهران',
                              'address' => 'خیابان x-کوچه y',
                              'no' => 11,
                              'unit' => 1,
                              'status' => 1,
        ];
    }
}
