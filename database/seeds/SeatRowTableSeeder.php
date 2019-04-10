<?php

use Illuminate\Database\Seeder;

class SeatRowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Seat_row::class, 25)->create();
    }
}
