<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    protected $fillable = [
        'name',
        'address',
        'note',
    ];

    public function rooms()
    {
        return $this->hasMany('App\Models\Room');
    }
}
