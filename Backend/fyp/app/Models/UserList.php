<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    protected $fillable=[
        'list_name',
        'user_id'
    ];
    protected $table = 'user_lists';

    public function movies(){
        return $this->belongsToMany(Movie::class);
    }

}
