<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductMeta>
 */
class ProductMetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $colors = ['مشکی', 'سفید', 'کرمی', 'سبز', 'نارنجی', 'آبی', 'قرمز'];
        $num = [90 , 100 , 110, 120, 130, 140, 150];
        $metas = [
            ['اندازه' , $num[rand(0, 6)] . '*' . $num[rand(0, 6)]],
            ['رنگ' , $colors[rand(0, 6)]],
            ['نفرات' , rand(1, 8) . ' نفره']
        ];

        $meta = $metas[rand(0, 2)];

            return [
                'meta_key' => $meta[0],
                'meta_value' => $meta[1] 
            ];
    }
}
