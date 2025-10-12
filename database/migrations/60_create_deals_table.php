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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('image');
            $table->longText('description')->nullable();
            $table->string('category')->nullable();
            $table->string('currency')->nullable();
            $table->unsignedBigInteger('price')->default(0);
            $table->string('location')->nullable();
            $table->string('contact')->nullable();
            $table->string('advertType')->nullable();
            $table->string('condition')->nullable();
            $table->unsignedBigInteger('views')->nullable();
            $table->string('status')->nullable();
            $table->string('subscription_type')->nullable();
            $table->string('listing_type')->nullable(); 
            $table->unsignedBigInteger('added_by');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('subscription_id')->nullable();
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');

            $table->unsignedBigInteger(column: 'service_id')->nullable();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
