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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique()->nullable(); // Razorpay order id
            $table->string('payment_id')->nullable(); // Razorpay payment id
            $table->string('signature')->nullable(); // Razorpay signature verification
            $table->string('receipt')->nullable(); // internal receipt id
            $table->string('full_name');
            $table->string('email');
            $table->string('contact', 20);
            $table->text('address');
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('zip_code', 20)->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('currency', 10)->default('INR');
            $table->enum('status', ['pending','success','failed','cancelled','refunded'])->default('pending');
            $table->string('payment_method')->default('razorpay');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
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
