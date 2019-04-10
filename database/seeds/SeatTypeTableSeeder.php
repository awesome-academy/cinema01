<?php

use Illuminate\Database\Seeder;

class SeatTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Seat_type::class, 25)->create();
    }
}
