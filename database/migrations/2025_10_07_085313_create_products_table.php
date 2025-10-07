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
            $table->id(); // Primary key
            $table->string('productname');
            $table->string('slug')->unique();
            $table->text('discription')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->integer('stock')->default(0);
            $table->boolean('best_seller')->default(false);
            $table->string('productimage')->nullable();
            $table->text('sizeandfit')->nullable();
            $table->text('materialandcare')->nullable();
            $table->text('spacification')->nullable();
            $table->text('impact_product')->nullable();
            $table->text('productimagegallery')->nullable(); // Can store JSON of multiple images
            $table->integer('min_order')->default(1);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps(); // created_at and updated_at
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
