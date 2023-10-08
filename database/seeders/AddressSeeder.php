<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Address;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.a
     */
    public function run(): void
    {
              DB::statement('truncate addresses');
			  Address::factory(5)->create(['user_id'=>1]);
    }
    
}
