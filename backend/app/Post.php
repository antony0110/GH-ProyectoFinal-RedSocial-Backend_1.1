<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name', 'imagen', 'user_id','descripcion',
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function likes()
    {
       return $this->morphMany('\App\Likeable','likeable');
    }
    public function comments()
    {
        return $this->hasMany('\App\Comment');
    }
}
