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

    public function seatRows()
    {
        return $this->hasMany('App\Models\Seat_row');
    }
}
