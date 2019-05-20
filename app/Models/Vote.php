<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'user_id',
        'movie_id',
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

    public function scopeUpdateVote ($query, $movieId, $userId, $point)
    {
        return $query->updateOrCreate(
            [
                'movie_id' => $movieId,
                'user_id' => $userId,
            ],
            [
                'movie_id' => $movieId,
                'user_id' => $userId,
                'point' => $point,
            ]);
    }
}
