<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductMeta;
use Illuminate\Support\Facades\DB;


class ProductMetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                DB::statement('truncate product_metas');
                ProductMeta::factory(1)->create();
    }
}
