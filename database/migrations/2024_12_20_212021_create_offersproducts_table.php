<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offersproducts', function (Blueprint $table) {
            $table->id();
           

            $table->unsignedBigInteger('id_product');
            $table->unsignedBigInteger('number');
            $table->unsignedBigInteger('id_offers');
            // $table->unsignedBigInteger('id_main_cat');
            // $table->unsignedBigInteger('id_sub_cat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offersproducts');
    }
};
