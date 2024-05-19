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
            $table->integer('duration_value');
            $table->string('duration_time_unit');
            $table->integer('no_of_devices');
            $table->integer('cost');
            $table->integer('base_price');
            $table->integer('end_user_price');
            $table->string('warranty');
            $table->string('description');
            $table->string('default_image')->default('../assets/images/ecommerce/png/1.png');
            $table->boolean('status')->default(true);
            // $table->foreignId('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreignId('collection_id')->nullable()->references('id')->on('collections')->onDelete('cascade');
            $table->foreignId('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');

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
