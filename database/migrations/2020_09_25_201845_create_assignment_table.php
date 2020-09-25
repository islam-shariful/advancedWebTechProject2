<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment', function (Blueprint $table) {
            //$table->id();
            //$table->timestamps();
            $table->bigIncrements('assignment_id');
            $table->string('filename');
            $table->string('directory');
            $table->date('date');
            $table->date('duedate');
            $table->integer('class_id');
            $table->integer('section_id');
            $table->integer('subject_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignment');
    }
}
