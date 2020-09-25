<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routine', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->integer('routine_id');
            $table->integer('class_id');
            $table->integer('section_id');
            $table->string('teacher_id');
            $table->string('startingtime');
            $table->string('endingtime');
            $table->string('day');
            $table->integer('subject_id');
            $table->string('teachername');
            $table->string('sectionname');
            $table->string('subjectname');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routine');
    }
}
