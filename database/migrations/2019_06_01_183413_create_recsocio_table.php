<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecsocioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recsocio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rec_id')->unsigned()->unique();
            $table->text('linkurl')->length(100)->nullable();
            $table->text('fburl')->length(100)->nullable();
            $table->text('tweeturl')->length(100)->nullable();
            $table->text('instaurl')->length(100)->nullable();
            $table->text('lang1')->length(100)->nullable();
            $table->text('lang2')->length(100)->nullable();
            $table->text('lang3')->length(100)->nullable();
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
        Schema::dropIfExists('recsocio');
    }
}
