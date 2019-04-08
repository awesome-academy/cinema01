<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'point',
    ];

    public function movie()
    {
        return $this->belongsTo('App\Models\Movie');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
