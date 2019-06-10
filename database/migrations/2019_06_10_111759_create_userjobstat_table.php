<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserjobstatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userjobstat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rec_id')->unsigned();
            $table->bigInteger('job_id', false, false)->unsigned()->unique();
            $table->tinyInteger('app_status')->length(10)->nullable();
            $table->timestamp('applied_at')->nullable();
            $table->timestamp('viewed_at')->nullable();
            $table->Integer('schedule_id', false, false)->unsigned()->unique();
            $table->Integer('interview_id', false, false)->unsigned()->unique();
            $table->foreign('rec_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('userjobstat');
    }
}
