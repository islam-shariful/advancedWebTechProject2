<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLostFoundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lost_found', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->bigInteger('lostfound_id');
            $table->string('lostname');
            $table->string('lostdescription');
            $table->date('lostday');
            $table->string('found');
            $table->string('received');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lost_found');
    }
}
