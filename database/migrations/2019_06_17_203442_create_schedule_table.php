<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rec_id')->unsigned();
            $table->bigInteger('job_id', false, false)->unsigned();
            $table->bigInteger('sch_id', false, false)->unsigned()->unique();
            $table->dateTime('schedule_start')->nullable();
            $table->dateTime('schedule_end')->nullable();
            $table->timestamp('schedule_at')->nullable();
            $table->bigInteger('schedule_byuser', false, false)->unsigned()->nullable();
            $table->bigInteger('schedule_byrec', false, false)->unsigned()->nullable();
            $table->tinyInteger('schedule_stat')->length(3)->nullable();
            $table->string('schedule_msg')->length(191)->nullable();
            $table->tinyInteger('interview_type')->length(3)->nullable();
            $table->tinyInteger('interview_round')->length(3)->nullable();
            $table->tinyInteger('interview_stat')->length(3)->nullable();
            $table->string('interview_msg')->length(191)->nullable();
            $table->tinyInteger('approve')->length(3)->nullable();
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
        Schema::dropIfExists('schedule');
    }
}
