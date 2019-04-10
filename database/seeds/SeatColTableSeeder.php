<?php

use Illuminate\Database\Seeder;

class SeatColTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Seat_col::class, 25)->create();
    }
}
