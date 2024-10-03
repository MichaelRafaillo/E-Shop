<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariantsTable extends Migration
{
    public function up()
    {
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('sku')->unique();
            $table->string('name'); // Variant name like "Red, Small"
            $table->decimal('price', 8, 2)->nullable(); // Price can be overridden for this variant
            $table->decimal('compare_at_price', 8, 2)->nullable(); // Compare-at price for this variant
            $table->decimal('cost_per_item', 8, 2)->nullable(); // Cost per item for this variant
            $table->boolean('is_physical')->default(true); // Indicate if the variant is physical
            $table->decimal('weight', 8, 2)->nullable(); // Weight of the variant
            $table->enum('weight_unit', ['kg', 'gm'])->nullable(); // Weight unit (kg or gm)
            $table->integer('stock'); // Stock quantity for this variant
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_variants');
    }
}
