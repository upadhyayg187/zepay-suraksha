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
            $table->string('name'); // e.g., "Secure Health Plus"
            $table->string('slug')->unique(); // e.g., "secure-health-plus"
            $table->string('category'); // e.g., "Health Insurance", "Motor Insurance"
            $table->string('provider'); // e.g., "HDFC Ergo", "Tata AIG"
            $table->text('summary'); // A short, catchy summary
            $table->longText('description'); // Full description of the policy
            $table->json('features')->nullable(); // Store key features as a JSON object
            $table->decimal('base_premium', 10, 2); // The starting premium amount
            $table->string('image_url')->nullable(); // A URL for a product-specific image
            $table->boolean('is_active')->default(true); // To easily enable/disable products
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


