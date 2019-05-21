<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdataddTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resuadd', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('add_id')->unsigned();
            $table->string('addtype')->length(3)->nullable()->unique();
            $table->text('addline1')->length(100)->nullable();
            $table->text('addline2')->length(100)->nullable();
            $table->text('city')->length(40)->nullable();
            $table->text('state')->length(40)->nullable();
            $table->mediumInteger('zcode')->length(6)->nullable();
            $table->text('country')->length(10)->nullable();
            $table->foreign('add_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('resuadd');
    }
}
