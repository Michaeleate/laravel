<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecpdetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recpdet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rec_id')->unsigned()->unique();
            $table->string('fname')->length(191)->nullable();
            $table->string('lname')->length(191)->nullable();
            $table->string('location')->length(191)->nullable();
            $table->string('email')->length(191)->nullable();
            $table->bigInteger('mobnum', false, false)->unsigned()->length(10)->nullable();
            $table->text('skype')->length(50)->nullable();
            $table->text('picname')->length(50)->nullable();
            $table->text('picpath')->length(50)->nullable();
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
        Schema::dropIfExists('recpdet');
    }
}
