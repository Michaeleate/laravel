<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdatepdetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resupdet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pdet_id')->unsigned()->unique();
            $table->string('fname')->length(191)->nullable();
            $table->string('email')->length(191)->nullable();
            $table->bigInteger('mob_num', false, false)->unsigned()->length(10)->nullable();
            $table->string('gender')->length(1)->nullable();
            $table->date('dob');
            $table->string('marstat')->length(1)->nullable();
            $table->string('eng_lang')->length(15)->nullable();
            $table->string('tel_lang')->length(15)->nullable();
            $table->string('hin_lang')->length(15)->nullable();
            $table->string('oth_lang')->length(15)->nullable();
            $table->string('diff_able')->length(3)->nullable();
            $table->string('able1')->length(1)->nullable();
            $table->string('able2')->length(1)->nullable();
            $table->string('able3')->length(1)->nullable();
            $table->string('profpic')->length(1)->nullable();
            $table->text('picpath')->length(50)->nullable();
            $table->text('picname')->length(30)->nullable();
            $table->foreign('pdet_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('resupdet');
    }
}
