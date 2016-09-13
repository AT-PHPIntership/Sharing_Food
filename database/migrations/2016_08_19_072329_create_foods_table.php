<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_food',50);
            $table->string('introduce',1000);
            $table->boolean('accept')->default('0');
            $table->integer('place_food_id')->unsigned();
            $table->foreign('place_food_id')->references('id')->on('places');
            $table->integer('types_id')->unsigned();
            $table->foreign('types_id')->references('id')->on('types');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
            $table->integer('food_store_id')->unsigned();
            $table->foreign('food_store_id')->references('id')->on('food_stores');
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
        Schema::drop('foods');
    }
}
