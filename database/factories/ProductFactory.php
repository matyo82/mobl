<?php

namespace Database\Factories;

use App\Models\ProductCategory;
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
        $mobls = ['راحتی', 'خانوادگی', 'چند نفره', 'ساده', 'سلطنتی', 'شیک', 'مدرن', 'کلاسیک', 'اداری'];
        return [
            'name' => 'مبل ' . $mobls[rand(0, 8)],
            'introduction' =>'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد.',
            'price' => rand(100000, 900000),
            'guarantee' => 1,
            'marketable' => rand(0, 1),
            'category_id' => rand(1, 5),
            'image' => 'images/products/test'. rand(1, 8).'.jpg',
            'status' => 1,
        ];
    }
}
