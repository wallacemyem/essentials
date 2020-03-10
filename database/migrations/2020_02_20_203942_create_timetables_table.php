<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('periods', function (Blueprint $table) {
          $table->increments('id');
          $table->string('teacher');
          $table->string('subject');
          $table->string('course');
          $table->string('hall');
          $table->integer('subject_completion_time')->unsigned();
          $table->date('date');
          $table->integer('period_number')->unsigned();
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
        Schema::dropIfExists('periods');
    }
}
