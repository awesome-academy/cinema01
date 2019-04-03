<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSeatPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seat_prices', function (Blueprint $table) {
            $table->dropForeign(['room_type_id']);
            $table->foreign('room_type_id')
                ->references('id')->on('room_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seat_prices', function (Blueprint $table) {
            $table->foreign('room_type_id')
                ->references('id')->on('rooms')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->dropForeign(['room_type_id']);
        });
    }
}
