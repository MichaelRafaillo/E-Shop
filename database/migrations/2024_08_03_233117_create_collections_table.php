<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
            $table->enum('collection_type', ['manual', 'automated']);
            $table->json('conditions')->nullable(); // Store conditions as JSON
            $table->enum('sort_order', [
                'best_selling', 
                'title_asc', 
                'title_desc', 
                'price_high_to_low', 
                'price_low_to_high', 
                'newest', 
                'oldest', 
                'manual'
            ])->default('best_selling');
            $table->string('image_url')->nullable(); // Add image_url column to store the URL of the image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collections');
    }
}
