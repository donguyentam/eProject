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
        
        // Schema::create('roles', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('slug');
        //     $table->string('name', 50);
        //     $table->text('permissions')->nullable();
        //     $table->timestamps();

        //     $table->engine = 'InnoDB';
        //     $table->unique('slug');
        // });

        // Schema::create('role_users', function (Blueprint $table) {
        //     $table->integer('user_id')->unsigned();
        //     $table->integer('role_id')->unsigned();
        //     $table->nullableTimestamps();

        //     $table->engine = 'InnoDB';
        //     $table->primary(['user_id', 'role_id']);
        // });
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('password');
            $table->string('email', 128)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->unique('email');
        });
             
        // Schema::create('password_reset_tokens', function (Blueprint $table) {
        //     $table->string('email')->primary();
        //     $table->string('token');
        //     $table->timestamp('created_at')->nullable();
        // });
        Schema::create('product_category', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('slug', 512)->nullable();
            $table->timestamps();
        });
        Schema::create('product_inventory', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->timestamps();

        });
        Schema::create('product_detail', function (Blueprint $table) {
            $table->id();

            $table->string('name', 50);
            $table->string('slug', 512)->nullable();
            $table->integer('price');
            $table->string('image')->nullable();
            $table->index('product_category_id');
            $table->index('product_inventory_id');

            $table->foreignId('product_category_id')->references('id')->on('product_category')->onDelete('cascade');
            $table->foreignId('product_inventory_id')->references('id')->on('product_inventory')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('product_detail')->onDelete('cascade');
            $table->integer('quantity')->nullable();
            $table->integer('price')->nullable();
            $table->timestamps();
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity')->nullable();
            $table->foreignId('order_detail_id')->references('id')->on('order_details')->onDelete('cascade');
            $table->timestamp('order_date')->nullable();
            $table->timestamps();
        });

        
        // Schema::create('cart_item', function (Blueprint $table) {
        //     $table->integer('shopping_cart_id')->unsigned();
        //     $table->integer('product_id')->unsigned();

        //     $table->integer('quantity')->nullable();
        //     $table->integer('total_price')->nullable();
        //     $table->primary(['shopping_cart_id', 'product_id']);
        // });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::drop('admin');
        // Schema::dropIfExists('role_users');
        // Schema::dropIfExists('roles');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('order');
        Schema::dropIfExists('order_product');
        Schema::dropIfExists('product_detail');
        Schema::dropIfExists('product_category');
        Schema::dropIfExists('product_inventory');
        Schema::dropIfExists('order_detail');
        Schema::dropIfExists('cart_item');
        Schema::dropIfExists('shopping_cart');
    }
};
