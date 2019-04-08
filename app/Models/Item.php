<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
        'price',
        'note',
    ];

    public function billDetail()
    {
        return $this->belongsTo('App\Models\Bill_detail');
    }
}
