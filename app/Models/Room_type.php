<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room_type extends Model
{
    protected $fillable = [
        'name',
        'note',
    ];
    
    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }

    public function seatPrices()
    {
        return $this->hasMany('App\Models\Seat_price');
    }
}
