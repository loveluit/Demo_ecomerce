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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->integer('category_id');
            $table->integer('brand_id')->nullable();
            $table->string('short_desp');
            $table->longText('desp');
            $table->string('product_image');
            $table->string('priview');
            $table->integer('regular_price');
            $table->integer('sale_price');
            $table->string('sku')->nullable();
            $table->string('quantity')->nullable();
            $table->string('stock')->nullable();
            $table->string('featured')->nullable();
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
