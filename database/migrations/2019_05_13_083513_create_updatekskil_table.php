<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdatekskilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resukskil', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('kskil_id')->unsigned()->unique();
            $table->text('kskil1')->length(10)->nullable();
            $table->text('kskil2')->length(10)->nullable();
            $table->text('kskil3')->length(10)->nullable();
            $table->text('kskil4')->length(10)->nullable();
            $table->text('kskil5')->length(10)->nullable();
            $table->foreign('kskil_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('resukskil');
    }
}
