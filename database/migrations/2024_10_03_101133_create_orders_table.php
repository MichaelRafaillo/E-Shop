<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
    
            // Order and Customer Details
            $table->unsignedBigInteger('customer_id'); // Reference to customer
            $table->string('order_number')->unique(); // Unique order number
            $table->decimal('subtotal', 10, 2); // Total before shipping and taxes
            $table->decimal('shipping_cost', 10, 2)->default(0); // Shipping cost
            $table->decimal('total', 10, 2); // Final total including shipping
            $table->decimal('paid', 10, 2)->default(0); // Amount paid
            $table->decimal('balance', 10, 2); // Balance due
            $table->enum('status', ['unfulfilled', 'fulfilled', 'payment pending', 'completed'])->default('payment pending'); // Order status
            $table->enum('payment_status', ['pending', 'paid'])->default('pending'); // Payment status
            $table->string('delivery_method')->nullable(); // Delivery method (e.g., "Cairo")
            $table->string('currency')->default('EGP'); // Currency used
            $table->date('delivery_date')->nullable(); // Delivery date
    
            // Courier/Shipping Information
            $table->unsignedBigInteger('courier_id')->nullable(); // Courier or shipping company ID for tracking
            $table->string('tracking_number')->nullable(); // Tracking number from courier/shipping company
    
            // Shipping Address Fields
            $table->string('shipping_first_name');
            $table->string('shipping_last_name');
            $table->string('shipping_company')->nullable();
            $table->string('shipping_address');
            $table->string('shipping_apartment')->nullable();
            $table->string('shipping_city');
            $table->string('shipping_governorate');
            $table->string('shipping_postal_code')->nullable();
            $table->string('shipping_country');
            $table->string('shipping_phone');
            
            // Billing Address Fields (nullable if same as shipping)
            $table->string('billing_first_name')->nullable();
            $table->string('billing_last_name')->nullable();
            $table->string('billing_company')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_apartment')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_governorate')->nullable();
            $table->string('billing_postal_code')->nullable();
            $table->string('billing_country')->nullable();
            $table->string('billing_phone')->nullable();
    
            $table->timestamps();
    
            // Foreign key constraints
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('courier_id')->references('id')->on('couriers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
