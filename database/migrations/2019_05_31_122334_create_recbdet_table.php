<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecbdetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recbdet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rec_id')->unsigned()->unique();
            $table->text('orgname')->length(191)->nullable();
            $table->text('weburl')->length(191)->nullable();
            $table->text('addline1')->length(191)->nullable();
            $table->text('addline2')->length(191)->nullable();
            $table->text('city')->length(191)->nullable();
            $table->text('state')->length(50)->nullable();
            $table->text('country')->length(50)->nullable();
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
        Schema::dropIfExists('recbdet');
    }
}
