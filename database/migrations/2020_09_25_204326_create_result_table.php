<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->integer('result_id');
            $table->integer('class_id');
            $table->integer('section_id');
            $table->integer('attendance');
            $table->integer('midmarks');
            $table->integer('finalmarks');
            $table->integer('total');
            $table->integer('subject_id');
            $table->string('student_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('result');
    }
}
