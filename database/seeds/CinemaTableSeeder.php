<?php

use Illuminate\Database\Seeder;

class CinemaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Cinema::class, 25)->create();
    }
}
