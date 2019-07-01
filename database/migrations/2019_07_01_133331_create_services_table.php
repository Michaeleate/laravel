<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('rec_id')->unsigned()->nullable();
            $table->bigInteger('serv_id')->unsigned()->unique();
            $table->bigInteger('credit_id')->unsigned()->unique();
            $table->tinyInteger('serv_type')->length(3)->nullable();
            $table->timestamp('serv_startdt')->nullable();
            $table->timestamp('serv_enddt')->nullable();
            $table->tinyInteger('servstat')->length(3)->nullable();
            $table->string('servmsg')->length(191)->nullable();
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
        Schema::dropIfExists('services');
    }
}
