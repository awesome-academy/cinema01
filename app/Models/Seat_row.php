<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat_row extends Model
{
    protected $fillable = [
        'row_name',
        'seat_type_id',
        'room_id',
    ];
    
    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }

    public function seatCols()
    {
        return $this->hasMany('App\Models\Seat_col');
    }

    public function seatType()
    {
        return $this->belongsTo('App\Models\Seat_type');
    }
}
