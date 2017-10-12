<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersMakeNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('age')->nullable()->change();
            $table->string('company')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->string('mobile')->nullable()->change();
            $table->string('height')->nullable()->change();
            $table->string('weight')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('age')->change();
            $table->string('company')->change();
            $table->string('address')->change();
            $table->string('mobile')->change();
            $table->string('height')->change();
            $table->string('weight')->change();
        });
    }
}
