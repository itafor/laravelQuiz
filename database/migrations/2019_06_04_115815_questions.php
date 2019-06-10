<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Questions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('questions', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->string('Qn');
           $table->string('ImageName')->nullable();
           $table->string('Option1');
           $table->string('Option2');
           $table->string('Option3');
           $table->string('Option4');
           $table->string('answer');
           $table->string('marks');
           $table->string('testCode');
           $table->rememberToken();
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
        Schema::dropIfExists('questions');
    }
}
