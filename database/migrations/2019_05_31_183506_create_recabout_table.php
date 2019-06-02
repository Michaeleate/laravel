<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecaboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recabout', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rec_id')->unsigned()->unique();
            $table->text('profname')->length(100)->nullable();
            $table->text('profurl')->length(100)->nullable();
            $table->text('shortprof')->length(140)->nullable();
            $table->text('charges')->length(6)->nullable();
            $table->text('servcity')->length(100)->nullable();
            $table->text('servstate')->length(50)->nullable();
            $table->text('servcountry')->length(50)->nullable();
            $table->boolean('remote')->default(false);
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
        Schema::dropIfExists('recabout');
    }
}
