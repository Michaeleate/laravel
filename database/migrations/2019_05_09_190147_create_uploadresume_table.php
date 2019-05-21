<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadresumeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resuload', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('resu_id')->unsigned()->unique();
            $table->text('oldresu')->length(250)->nullable();
            $table->text('newresu')->length(250)->nullable();
            $table->text('resupath')->length(150)->nullable();
            $table->foreign('resu_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('resuload');
    }
}
