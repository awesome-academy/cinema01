<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowtimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showtimes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('movie_id')->unsigned();            
            $table->bigInteger('room_id')->unsigned();            
            $table->timestamp('timestar');
            $table->timestamps();
            $table->foreign('movie_id')
                ->references('id')->on('movies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('room_id')
                ->references('id')->on('rooms')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('showtimes');
    }
}
