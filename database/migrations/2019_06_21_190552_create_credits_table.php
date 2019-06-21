<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('rec_id')->unsigned()->nullable();
            $table->bigInteger('credit_id')->unsigned()->unique();
            $table->bigInteger('intrans_id')->unsigned()->unique();
            $table->Integer('credits')->nullable();
            $table->tinyInteger('credit_type')->length(3)->nullable();
            $table->tinyInteger('status')->length(3)->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->foreign('rec_id')->references('id')->on('recruiters')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('credits');
    }
}
