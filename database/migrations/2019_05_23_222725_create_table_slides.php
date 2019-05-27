<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSlides extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('movie_id')->unsigned(); 
            $table->tinyInteger('status');
            $table->string('image');
            $table->foreign('movie_id')
                ->references('id')->on('movies')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('slides');
    }
}
