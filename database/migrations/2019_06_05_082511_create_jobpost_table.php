<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobpostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobpost', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rec_id')->unsigned();
            $table->bigInteger('job_id', false, false)->unsigned()->unique();
            $table->text('jtitle')->length(100)->nullable();
            $table->text('jd')->length(750)->nullable();
            $table->tinyInteger('qty')->length(4)->nullable();
            $table->text('keywords')->length(200)->nullable();
            $table->text('minexp')->length(3)->nullable();
            $table->text('maxexp')->length(3)->nullable();
            $table->Integer('minsal', false, false)->unsigned()->length(6)->nullable();
            $table->Integer('maxsal', false, false)->unsigned()->length(6)->nullable();
            $table->text('hireloc1')->length(3)->nullable();
            $table->text('hireloc2')->length(3)->nullable();
            $table->text('hireloc3')->length(3)->nullable();
            $table->text('comhirefor')->length(100)->nullable();
            $table->text('jstatus')->length(20)->nullable();
            $table->timestamp('valid_till')->nullable();
            $table->text('auto_aprove')->length(10)->nullable();
            $table->text('auto_upd')->length(10)->nullable();
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
        Schema::dropIfExists('jobpost');
    }
}
