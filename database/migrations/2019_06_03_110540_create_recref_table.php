<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecrefTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recref', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rec_id')->unsigned();
            $table->text('refnum')->length(3)->nullable();
            $table->text('fname')->length(100)->nullable();
            $table->text('location')->length(100)->nullable();
            $table->text('email')->length(100)->nullable();
            $table->bigInteger('mobnum', false, false)->unsigned()->length(10);
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
        Schema::dropIfExists('recref');
    }
}
