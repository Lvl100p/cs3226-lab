<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEarnedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earned', function (Blueprint $table) {
            $table->increments('id');
						$table->unsignedInteger('student_id');
						$table->foreign('student_id')
						      ->references('id')->on('students')
									->onDelete('cascade')
									->onUpdate('cascade');
						$table->unsignedInteger('achievement_id');
						$table->foreign('achievement_id')
						      ->references('id')->on('achievements')
									->onDelete('cascade')
									->onUpdate('cascade');
						$table->unsignedSmallInteger('tier'); // should be positive
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
        Schema::dropIfExists('earned');
    }
}
