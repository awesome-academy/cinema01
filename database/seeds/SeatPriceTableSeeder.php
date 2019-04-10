<?php

use Illuminate\Database\Seeder;

class SeatPriceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Seat_price::class, 25)->create();
    }
}
