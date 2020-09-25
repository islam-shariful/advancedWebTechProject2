<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->integer('class_id');
            $table->integer('section_id');
            $table->string('studnetname');
            $table->string('studnetemail');
            $table->string('studnetaddress');
            $table->string('studnetimage');
            $table->string('studnetbloodegroup');
            $table->string('studnetfathername');
            $table->string('studnetmothername');
            $table->integer('guarddiannumber');
            $table->string('admissionclass');
            $table->string('studentdob');
            $table->string('studentgender');
            $table->string('studentreligion');
            $table->date('admissiondate');
            $table->string('disorder');
            $table->string('allergic');
            $table->string('heartproblem');
            $table->string('otherdisease');
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
        Schema::dropIfExists('student');
    }
}
