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
        Schema::create('category_subcategory', function (Blueprint $table) {
            $table->id();
            $table->ForeignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->ForeignId('subcategory_id')->constrained('subcategories')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_subcategory');
    }
};
