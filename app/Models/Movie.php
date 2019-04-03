<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
