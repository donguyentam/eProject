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
            $table->foreignId('user_id')->constrained('users');
        });
        // Schema::create('user_address', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('address')->nullable();
        //     $table->string('country')->nullable();
        //     $table->string('phone_number')->nullable();
        //     $table->timestamps();
        // });
        // Schema::table('user_address', function ($table) {
        //     $table->foreignId('user_id')->constrained('users');
        // });
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
