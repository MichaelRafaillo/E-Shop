<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->decimal('compare_at_price', 8, 2)->nullable();
            $table->decimal('cost_per_item', 8, 2)->nullable();
            $table->boolean('is_physical')->default(true); // Indicate if the product is physical
            $table->decimal('weight', 8, 2)->nullable(); // Weight of the product
            $table->enum('weight_unit', ['kg', 'gm'])->nullable(); // Weight unit (kg or gm)
            $table->enum('status', ['active', 'draft'])->default('draft'); // Status of the product
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
