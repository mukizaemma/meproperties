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
    Schema::create('properties', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('slug')->unique();
        $table->string('image')->nullable();
        $table->longText('description')->nullable();

        // Core Filters
        $table->enum('listing_type', ['Sell', 'Rent', 'Buy'])->index(); // top-level filter
        $table->enum('category', ['Residential', 'Commercial', 'Land'])->index(); // sub-category

        // Location
        $table->string('city')->index();
        $table->string('other_city')->nullable();
        $table->string('location')->nullable()->index();

        // Property Details
        $table->string('property_type')->nullable(); // optional finer type, e.g. "Apartment", "Office", "Plot"
        $table->unsignedInteger('bedrooms')->nullable();
        $table->unsignedInteger('bathrooms')->nullable();
        $table->unsignedInteger('parking')->nullable(); // number of parking spots, not boolean

        // Price & Currency
        $table->string('currency', 10)->nullable();
        $table->unsignedBigInteger('price')->default(0);

        // Extra Info
        $table->enum('furnished_status', ['Unfurnished', 'Semi-Furnished', 'Furnished'])->nullable();
        $table->string('contact')->nullable();
        $table->string('email')->nullable();

        // Ownership & Relations
        $table->unsignedBigInteger('added_by');
        $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');

        $table->unsignedBigInteger('subscription_id')->nullable();
        $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');

        $table->unsignedBigInteger('amenity_id')->nullable();
        $table->foreign('amenity_id')->references('id')->on('amenities')->onDelete('cascade');

        // Misc
        $table->unsignedBigInteger('views')->default(0);
        $table->enum('status', ['New','Featured','Promo','Available', 'Unavailable','Pending', 'Sold', 'Rented'])->default('New');
        $table->string('subscription_type')->nullable();

        $table->softDeletes();
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
