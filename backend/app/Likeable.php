<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likeable extends Model
{    protected $fillable=[
    'likeable_id',
    'likeable_type',
    'user_id'
];
    public function user(){
        return $this->hasMany('App\User');
    }
    public function likeable(){
        return $this->morphTo();
    }
}