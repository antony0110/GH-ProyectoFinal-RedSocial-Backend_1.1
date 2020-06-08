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
}
