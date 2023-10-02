<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\OrderItemSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\AddressSeeder;
use Illuminate\Support\Facades\Schema;



class DatabaseSeeder extends Seeder
{
          /**
           * Seed the application's database.
           */
          public function run(): void
          {
                     Schema::disableForeignKeyConstraints();
		             $this->call(OrderSeeder::class);
		             $this->call(OrderItemSeeder::class);
		             $this->call(AddressSeeder::class);
		             $this->call(ProductSeeder::class);
                     Schema::enableForeignKeyConstraints();
          }
}
