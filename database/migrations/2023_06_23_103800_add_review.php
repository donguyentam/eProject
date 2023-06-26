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
        Schema::create('review', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment', 512)->nullable();
            $table->integer('rating')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';

        });
        Schema::table('review', function ($table) {
            $table->foreignId('users_id')->constrained('users');
            $table->foreignId('product_id')->constrained('product_detail');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('review');

    }
};
