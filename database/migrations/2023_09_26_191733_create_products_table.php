<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // name and title and description
            $table->string('name');
            $table->string('title');
            $table->text('description');
            // Sofa Features | ویژگی های مبل
            $table->string('kalaf');
            $table->string('fabric_color');
            // چند مبل تک یادو یا سه نفر موجود است
            $table->string('multi_one')->nullable();
            $table->string('multi_two')->nullable();
            $table->string('multi_three')->nullable();
            // نوع اسفنح
            $table->string('spongeetype')->nullable();
            // guarantee: 0 = no, 1 = yes
            $table->enum('guarantee', [0, 1]);
            // options
            $table->text('options');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
