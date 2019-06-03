<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecsareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recsarea', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rec_id')->unsigned()->unique();
            $table->text('sarea1')->length(100)->nullable();
            $table->text('sarea2')->length(100)->nullable();
            $table->text('sarea3')->length(100)->nullable();
            $table->text('sainfo')->length(700)->nullable();
            $table->text('sapos')->length(200)->nullable();
            $table->text('saclients')->length(100)->nullable();
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
        Schema::dropIfExists('recsarea');
    }
}
