<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transact', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('intrans_id')->unsigned()->unique();
            $table->string('extrans_id')->length(20);
            $table->tinyInteger('trans_type')->length(3)->nullable();
            $table->Integer('trans_amnt')->nullable();
            $table->tinyInteger('prod_id')->length(3)->nullable();
            $table->string('prod_info')->length(191)->nullable();
            $table->tinyInteger('trans_with')->length(3)->nullable();
            $table->timestamp('trans_validto')->nullable();
            $table->tinyInteger('trans_stat')->length(3)->nullable();
            $table->string('trans_msg')->length(191)->nullable();
            $table->bigInteger('trans_byuser')->unsigned()->nullable();
            $table->bigInteger('trans_byrec')->unsigned()->nullable();
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
        Schema::dropIfExists('transact');
    }
}
