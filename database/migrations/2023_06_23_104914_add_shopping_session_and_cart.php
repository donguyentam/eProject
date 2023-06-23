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
        //
        Schema::create('shopping_session', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('shopping_session', function ($table) {
            $table->foreignId('user_id')->constrained('user');
        });
        Schema::create('user_address', function (Blueprint $table) {
            $table->id();
            $table->string('address_line1', 100);
            $table->string('address_line2', 100)->nullable();
            $table->string('city', 187);
            $table->string('postal_code', 70);
            $table->string('country', 50);
            $table->string('phone_number', 70);
            $table->timestamps();
        });
        Schema::table('user_address', function ($table) {
            $table->foreignId('user_id')->constrained('user');
        });
        Schema::create('cart_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->timestamps();
        });
        Schema::table('cart_item', function ($table) {
            $table->foreignId('session_id')->constrained('shopping_session');
            $table->foreignId('product_id')->constrained('product_detail');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('user_address');
        Schema::dropIfExists('shopping_session');
    }
};
