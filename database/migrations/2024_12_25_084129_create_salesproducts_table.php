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
        Schema::create('salesproducts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_p');
            $table->unsignedBigInteger('id_bill');
            $table->unsignedBigInteger('count');
            $table->unsignedBigInteger('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salesproducts');
    }
};
