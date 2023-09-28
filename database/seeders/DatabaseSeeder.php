<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ProductCategoriesSeeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
                     Schema::disableForeignKeyConstraints();
		             $this->call(ProductCategoriesSeeder::class);
                     Schema::enableForeignKeyConstraints();
    }
}
