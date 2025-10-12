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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('slug')->unique();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->string('url')->nullable();
            $table->longText('description')->nullable();
            $table->enum('subscription_type', ['Free','Basic', 'Premium', 'Gold'])->default('Free');
            $table->decimal('amount_paid', 10, 2)->default(0);
            $table->decimal('amount_due', 10, 2)->default(0);
            $table->boolean('is_paid')->default(false);
            $table->boolean('is_recurring')->default(false); // <== Added
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->timestamp('next_due_date')->nullable(); // <== Added
            $table->boolean('grants_account')->default(false); // <== Added
            $table->string('status')->default('active'); // active, expired, cancelled

            $table->unsignedBigInteger('added_by');
            $table->foreign("added_by")->references("id")->on("users")->onDelete("cascade");
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
