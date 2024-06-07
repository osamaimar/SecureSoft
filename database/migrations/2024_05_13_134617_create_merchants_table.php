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
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('company_name');
            $table->string('address');
            $table->string('first_phone_number', 255);
            $table->string('second_phone_number', 255)->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('image_path')->nullable();
            $table->foreignId('category_id')->nullable()->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('favorite_id')->nullable();
            $table->foreignId('cart_id')->nullable()->constrained()->onDelete('set null'); // Add this line
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchants');
    }
};
