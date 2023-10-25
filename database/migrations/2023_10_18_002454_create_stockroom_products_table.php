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
        Schema::create('stockroom_products', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['arrival', 'sale', 'movement'])->nullable()->change();
            $table->foreignId('stockroom_id')->constrained('stockrooms');
            $table->foreignId('product_id')->constrained('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stockroom_products');
    }
};
