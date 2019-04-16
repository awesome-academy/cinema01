<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Showtime;

use DB;

class Movie extends Model
{
    protected $fillable = [
        'name',
        'type',
        'producer',
        'country',
        'cast',
        'day_start',
        'time',
        'content',
        'directors',
    ];

    public function votes()
    {
        return $this->hasMany('App\Models\Vote');
    }

    public function showtimes()
    {
        return $this->hasMany('App\Models\Showtime');
    }

    protected function getListCinema($id)
    {
        $a = Movie::with('showtimes.room.cinema')->where('id', $id)->firstOrFail();
        $cinemas = [];
        foreach ($a->showtimes as $value) {
            array_push($cinemas, $value->room->cinema);   
        }
        
        return array_unique($cinemas);
    }
}
