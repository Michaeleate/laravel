<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recemp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rec_id')->unsigned();
            $table->string('emp_name')->length(100)->nullable()->unique();
            $table->text('desg')->length(100)->nullable();
            $table->date('startdt')->nullable();
            $table->text('enddt')->nullable();
            $table->mediumInteger('msal')->length(6)->nullable();
            $table->text('resp')->length(2500)->nullable();
            $table->text('nperiod')->length(10)->nullable();
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
        Schema::dropIfExists('recemp');
    }
}
