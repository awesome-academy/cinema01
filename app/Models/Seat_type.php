<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat_type extends Model
{
    protected $fillable = [
        'name',
        'note',
    ];
    
    public function seatPrice()
    {
        return $this->hasOne('App\Models\Seat_type');
    }

    public function seatRow()
    {
        return $this->belongsTo('App\Models\Seat_row');
    }
}
