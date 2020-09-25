<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->bigInteger('note_id');
            $table->string('finename');
            $table->string('directory');
            $table->date('date');
            $table->integer('subject_id');
            $table->integer('section_id');
            $table->integer('class_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('note');
    }
}
