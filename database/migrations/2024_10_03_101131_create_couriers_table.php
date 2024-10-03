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
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['individual', 'company']);  // Type of courier: individual or company
            $table->string('name');  // Name of the courier (individual's name or company name)
            
            // For individual couriers
            $table->string('individual_contact_number')->nullable();  // Contact phone number for individual couriers
            
            // For company couriers
            $table->string('company_contact_person')->nullable();  // Contact person in the shipping company
            $table->string('company_phone_number')->nullable();  // Shipping company phone number
            $table->string('company_website_url')->nullable();  // Website for the shipping company
            
            $table->timestamps();  // Timestamps for record creation and updates
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('couriers');
    }
};
