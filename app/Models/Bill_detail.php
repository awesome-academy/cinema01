<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    protected $fillable = [
        'quantity',
    ];

    public function bill()
    {
        return $this->belongsTo('App\Models\Bill');
    }

    public function items()
    {
        return $this->hasMany('App\Models\Item');
    }
}
