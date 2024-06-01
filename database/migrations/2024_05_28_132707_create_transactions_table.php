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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->longText('detail')->nullable()->default(null);
            $table->string('customer_name')->nullable()->default(null);
            $table->string('order_id')->nullable()->default(null);
            $table->integer('total')->nullable()->default(null);
            $table->integer('pay')->nullable()->default(null);
            $table->integer('return')->nullable()->default(null);
            $table->boolean('status')->nullable()->default(false);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
