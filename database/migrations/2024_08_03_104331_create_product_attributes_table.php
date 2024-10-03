<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Attribute name like "Color", "Size"
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_attributes');
    }
}
