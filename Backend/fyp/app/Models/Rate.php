<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'rating',
        'review',
        'user_id',
        'movie_id'
    ];

    protected $table = 'rates';


}
