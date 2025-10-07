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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Unique, auto-increment primary key
            $table->string('name')->unique(); // Category name
            $table->string('slug')->unique(); // URL-friendly name
            $table->string('image')->nullable(); // Optional category image
            $table->enum('status', ['active', 'inactive'])->default('active'); // Active/inactive category
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
