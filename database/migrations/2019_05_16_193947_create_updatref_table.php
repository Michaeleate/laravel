<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdatrefTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resuref', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ref_id')->unsigned();
            $table->text('refnum')->length(3)->nullable();
            $table->text('fname')->length(100)->nullable();
            $table->text('location')->length(100)->nullable();
            $table->text('email')->length(100)->nullable();
            $table->bigInteger('mobnum', false, false)->unsigned()->length(10);
            $table->foreign('ref_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('resuref');
    }
}
