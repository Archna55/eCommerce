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
            $table->string('name');
            $table->string('slug')->unique();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->enum('stock_status', ['instock', 'outstock']);
            $table->boolean('featured')->default(false);
            $table->string('short_description')->nullable();
            $table->text('description');
            $table->string('image')->nullable();
            $table->text('images')->nullable();
            $table->decimal('regular_price')->nullable();
            $table->decimal('sale_price');
            $table->string('SKU');
            $table->unsignedBigInteger('quantity')->default(10);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
