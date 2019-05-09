<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $guarded = [
        'id',
    ];

    public function billDetails()
    {
        return $this->hasMany('App\Models\Bill_detail');
    }

    public function tickets()
    {
        return $this->hasMany('App\Models\Ticket');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
