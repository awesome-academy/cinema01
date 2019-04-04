<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();      
            $table->bigInteger('bill_id')->unsigned();
            $table->bigInteger('seat_col_id')->unsigned();
            $table->bigInteger('showtime_id')->unsigned();           
            $table->string('code', 255);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('bill_id')
                ->references('id')->on('bills')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('seat_col_id')
                ->references('id')->on('seat_cols')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('showtime_id')
                ->references('id')->on('showtimes')
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
        Schema::dropIfExists('tickets');
    }
}
