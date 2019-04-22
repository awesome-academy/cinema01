<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
        'cinema_id',
        'room_type_id',
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

    public function roomType()
    {
        return $this->belongsTo('App\Models\Room_type');
    }

    public function showtimes()
    {
        return $this->hasMany('App\Models\Showtime');
    }
}
