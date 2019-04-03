<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
        'note',
    ];

    public function cinema()
    {
        return $this->belongsTo('App\Models\Cinema');
    }

    public function seatRows()
    {
        return $this->hasMany('App\Models\Seat_row');
    }

    public function roomTypes()
    {
        return $this->hasMany('App\Models\Room_type');
    }

    public function showtimes()
    {
        return $this->hasMany('App\Models\Showtime');
    }
}
