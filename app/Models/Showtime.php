<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    protected $guarded = [
        'id',
    ];

    public function movie()
    {
        return $this->belongsTo('App\Models\Movie');
    }

    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }

    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }
}
