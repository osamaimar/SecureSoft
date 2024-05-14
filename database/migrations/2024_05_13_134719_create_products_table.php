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
            $table->string('name');
            $table->integer('duration');
            $table->integer('no_of_devices');
            $table->integer('base_price');
            $table->integer('end_user_price');
            $table->integer('warranty');
            // $table->foreignId('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreignId('collection_id')->references('id')->on('collections')->onDelete('cascade');

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
