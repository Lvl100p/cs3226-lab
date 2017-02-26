<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->decimal('mc', 2, 1);
            $table->decimal('tc', 2, 1);;
            $table->decimal('hw', 2, 1);;
            $table->decimal('bs', 2, 1);
            $table->decimal('ks', 2, 1);
            $table->decimal('ac', 2, 1);
            $table->integer('week');
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
        Schema::dropIfExists('scores');
    }
}
