<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cinema_id')->unsigned();            
            $table->bigInteger('room_type_id')->unsigned();
            $table->string('name', 255);
            $table->string('note', 255)->nullable();
            $table->timestamps();
            $table->foreign('cinema_id')
                ->references('id')->on('cinemas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('room_type_id')
                ->references('id')->on('room_types')
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
        Schema::dropIfExists('rooms');
    }
}
