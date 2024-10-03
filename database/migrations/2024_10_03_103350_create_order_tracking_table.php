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
        Schema::create('order_tracking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');  // Reference to the order being tracked
            $table->string('status');  // Tracking status (e.g., "Shipped", "In Transit", "Delivered")
            $table->text('notes')->nullable();  // Optional notes for the tracking status
            $table->timestamp('status_updated_at');  // When this status was last updated
            $table->timestamps();
    
            // Foreign key
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_tracking');
    }
};
