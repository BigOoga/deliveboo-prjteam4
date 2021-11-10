<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->string('remember_token', 100)->nullable();
            $table->string('address');
            $table->string('iva')->unique();
            $table->string('image')->nullable();
            $table->unsignedInteger('delivery_fee');
            $table->tinyInteger('votes')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_open');
            $table->time('opening_time');
            $table->time('closing_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
