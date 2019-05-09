<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = [
        'id',
    ];

    public function bill()
    {
    	return $this->belongsTo('App\Models\Bill');
    }

    public function seatCol()
    {
    	return $this->belongsTo('App\Models\Seat_col');
    }

    public function showtime()
    {
    	return $this->belongsTo('App\Models\Showtime');
    }
}
