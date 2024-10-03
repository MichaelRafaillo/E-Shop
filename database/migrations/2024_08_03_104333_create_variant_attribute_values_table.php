<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantAttributeValuesTable extends Migration
{
    public function up()
    {
        Schema::create('variant_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_variant_id');
            $table->unsignedBigInteger('product_attribute_value_id');
            $table->timestamps();

            $table->foreign('product_variant_id')->references('id')->on('product_variants')->onDelete('cascade');
            $table->foreign('product_attribute_value_id')->references('id')->on('product_attribute_values')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('variant_attribute_values');
    }
}
