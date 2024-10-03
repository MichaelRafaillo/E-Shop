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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');  // Reference to product
            $table->unsignedBigInteger('variant_id')->nullable();  // Reference to product variant, if applicable
            $table->string('name');  // Item name (product or variant name)
            $table->integer('quantity')->default(1);  // Quantity of the item
            $table->decimal('price', 8, 2);  // Item price
            $table->decimal('total', 8, 2);  // Total for this line item
            $table->timestamps();  // Timestamps
    
            // Foreign keys
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('variant_id')->references('id')->on('product_variants')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
