<?php

use Illuminate\Support\Facades\Schema;
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

            $table->string('name');
            $table->integer('age')->unsigned();
            $table->string('email')->unique();
            $table->string('company');
            $table->text('address');
            $table->string('mobile');
            $table->string('password');
            $table->float('height');
            $table->float('weight');
            $table->rememberToken();
            
            $table->timestamps();

            $table->index('name');
            $table->index('mobile');
            $table->index('company');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
