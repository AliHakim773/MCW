<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable = [
        'actor_name',
        'birthdate',
        'nationality',
        'img_url'
    ];

    protected $table = 'actors';

    public function movies(){
        return $this->belongsToMany(Movie::class);
    }


}
