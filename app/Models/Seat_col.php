<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat_col extends Model
{
    protected $fillable = [
        'status',
        'seat_row_id',
        'seat_name',
    ];
    
    public function seatRow()
    {
        return $this->belongsTo('App\Models\Seat_row');
    }

    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }
}
