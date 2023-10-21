<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductFabric;
use App\Models\ProductMeta;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

			  DB::statement('truncate products');
			  DB::statement('truncate product_fabrics');
			  Product::factory(30)
              ->has(ProductFabric::factory()->count(4))
              ->has(ProductMeta::factory()->count(3))
              ->create();;			  

    }
	
}
 