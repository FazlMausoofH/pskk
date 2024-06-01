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
            $table->string('code')->default(null)->nullable();
            $table->string('name')->default(null)->nullable();
            $table->integer('selling_price')->default(null)->nullable();
            $table->integer('purchase_price')->default(null)->nullable();
            $table->string('unit')->default(null)->nullable();
            $table->string('category')->default(null)->nullable();
            $table->string('image')->nullable()->default(null);
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
