<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Genre extends Model
{
    protected $fillable=[
        'genre'
    ];
    protected $table = 'genres';

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
