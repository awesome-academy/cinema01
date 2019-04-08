<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat_price extends Model
{
    protected $fillable = [
        'price',
    ];
    
    public function seatType()
    {
        return $this->belongsTo('App\Models\Seat_type');
    }

    public function roomType()
    {
        return $this->belongsTo('App\Models\Room_type');
    }
}
