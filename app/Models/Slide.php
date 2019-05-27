<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = [
        'movie_id',
        'status',
        'image',
    ];

    public function movie()
    {
    	return $this->belongsTo('App\Models\Movie');
    }
}
