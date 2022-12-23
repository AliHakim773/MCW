<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'movie_name',
        'poster_url',
        'rating',
        'synopsis',
        'genre_id'
    ];
    protected $table = 'movies';

    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
    public function userLists(){
        return $this->belongsToMany(UserList::class);
    }
}
