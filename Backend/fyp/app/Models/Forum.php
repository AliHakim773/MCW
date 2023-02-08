<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{

    protected $fillable = [
        'user_id',
        'title',
        'content'
    ];

    protected $table = 'forums';
    public function user(){
        return $this->belongsTo(User::class);
    }
}
