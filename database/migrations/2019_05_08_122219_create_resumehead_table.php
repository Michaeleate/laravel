<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumeheadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resuhead', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('head_id')->unsigned()->unique();
            $table->text('head_line')->length(255)->nullable();
            $table->foreign('head_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('resuhead');
    }
}
