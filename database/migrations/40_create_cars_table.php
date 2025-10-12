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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('image');
            $table->unsignedBigInteger('price')->default(0);
            $table->string('currency')->nullable();
            $table->longText('description')->nullable();
            $table->string('model')->nullable();
            $table->integer('year')->nullable();
            $table->string('color')->nullable();
            $table->unsignedInteger('mileage')->nullable();
            $table->string('engineType')->nullable();
            $table->string('advertType')->nullable();
            $table->string('transmission')->nullable();
            $table->string('doors')->nullable();
            $table->string('ownerTel')->nullable();
            $table->string('contact')->nullable();
            $table->string('location')->nullable();
            $table->unsignedBigInteger('views')->nullable();
            $table->unsignedInteger('ownerId')->nullable();
            $table->enum('status', ['Active', 'Inactive','Sold'])->default('Active');
            $table->string('subscription_type')->nullable();

            $table->unsignedBigInteger('cartype_id');
            $table->foreign("cartype_id")->references("id")->on("cartypes")->onDelete("cascade");

            $table->unsignedBigInteger('added_by');
            $table->foreign("added_by")->references("id")->on("users")->onDelete("cascade");

            $table->unsignedBigInteger('subscription_id')->nullable();
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
