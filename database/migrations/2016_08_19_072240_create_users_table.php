<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',50);
            $table->string('email',100)->unique();
            $table->string('password',50);
            $table->string('avatar',100);
            $table->string('fullname',100);
            $table->string('address',100);
            $table->date('birthday',10);
            $table->string('phone',14);
            $table->string('information',1000);
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->integer('types_id')->unsigned();
            $table->foreign('types_id')->references('id')->on('types');
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
        Schema::drop('users');
    }
}
