<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_id');
            $table->string('teachername');
            $table->string('teacheremail');
            $table->string('teacherdesignation');
            $table->string('teacherdepartment');
            $table->string('teacheraddress');
            $table->string('teacherdob');
            $table->string('teachergender');
            $table->string('teacherreligion');
            $table->date('teacherjoiningdate');
            $table->string('teacherfathername');
            $table->string('teachermothername');
            $table->integer('subject_id');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher');
    }
}
