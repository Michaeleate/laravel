<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdateeduTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resuedu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('edu_id')->unsigned();
            $table->string('qual')->length(10)->nullable()->unique();
            $table->text('board')->length(10)->nullable();
            $table->text('course')->length(10)->nullable();
            $table->text('spec')->length(10)->nullable();
            $table->text('colname')->length(250)->nullable();
            $table->text('district')->length(10)->nullable();
            $table->text('cortype')->length(10)->nullable();
            $table->year('pyear')->nullable();
            $table->text('edulang')->length(10)->nullable();
            $table->text('percentage')->length(3)->nullable();
            $table->foreign('edu_id')->references('id')->on('users')->onDelete('cascade');
            //$table->unique(['edu_id','qual']);
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
        Schema::dropIfExists('resuedu');
    }
}
