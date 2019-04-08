<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ItemTableSeeder::class);
        $this->call(RoomTypeTableSeeder::class);
        $this->call(CinemaTableSeeder::class);
        $this->call(SeatTypeTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(MovieTableSeeder::class);
        $this->call(RoomTableSeeder::class);
        $this->call(ShowtimeTableSeeder::class);
        $this->call(SeatPriceTableSeeder::class);
        $this->call(SeatRowTableSeeder::class);
        $this->call(BillTableSeeder::class);
        $this->call(SeatColTableSeeder::class);
        $this->call(TicketTableSeeder::class);
        $this->call(BillDetailTableSeeder::class);
        $this->call(VoteTableSeeder::class);
    }
}
