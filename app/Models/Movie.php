<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\FullTextSearch;

use App\Models\Showtime;

use DB;

class Movie extends Model
{
    use FullTextSearch;
    protected $searchable = [
        'name',
    ];

    protected $guarded = [
        'id',
    ];

    public function votes()
    {
        return $this->hasMany('App\Models\Vote');
    }

    public function showtimes()
    {
        return $this->hasMany('App\Models\Showtime');
    }

    public function slide()
    {
        return $this->hasOne('App\Models\Slide');
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
