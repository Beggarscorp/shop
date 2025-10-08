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
        Schema::table('categories', function (Blueprint $table) {
                Schema::table('categories', function (Blueprint $table) {
                // Adding a nullable parent_id column (for subcategories)
                $table->unsignedBigInteger('parent_id')->nullable()->after('id');

                // Optional: If you want to add a foreign key reference
                $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropColumn('parent_id');
        });
    }
};
