<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subjectName');
            $table->integer('numberOfQn');
            $table->integer('duration');
            $table->string('testCode');
            $table->mediumtext('instruction');
            $table->unsignedBigInteger('participantId');
            $table->foreign('participantId')->references('id')->on('participants');
            
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
       Schema::dropIfExists('tests');
    }
}
