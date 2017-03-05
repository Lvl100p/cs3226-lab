<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('flag');
            $table->string('nickname');
            $table->string('access')->default('student');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->dateTime('last_logged_in_at')->default(\Carbon\Carbon::now());
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
        Schema::drop('students');
    }
}
