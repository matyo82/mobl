<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ProductCategory;

class ProductCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        	$categories=['راحتی','کلاسیک','سلطنتی','مدرن','یک نفره'];
			  
              DB::statement('truncate product_categories');
			 
			  foreach($categories as $category){
               ProductCategory::factory(1)->create(['name'=>$category]);
			 }
    }
}
