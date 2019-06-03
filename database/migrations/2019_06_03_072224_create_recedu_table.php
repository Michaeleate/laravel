<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceduTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recedu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rec_id')->unsigned();
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
            $table->foreign('rec_id')->references('id')->on('recruiters')->onDelete('cascade');
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
        Schema::dropIfExists('recedu');
    }
}
