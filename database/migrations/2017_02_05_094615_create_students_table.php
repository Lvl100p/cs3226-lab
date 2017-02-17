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
            $table->integer('rank');
            $table->string('nickname');
            $table->string('name');
            $table->string('flag');
            $table->integer('mc');
            $table->integer('tc');
            $table->integer('spe');
            $table->integer('hw');
            $table->integer('bs');
            $table->integer('ks');
            $table->integer('ac');
            $table->integer('dil');
            $table->integer('sum');
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
