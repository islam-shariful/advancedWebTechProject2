<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
      'name','email','password','api_token'
    ];

    protected $hidden = [
      'password', 'remember_token'
    ];

    public function accounts(){
      return $this->hasMany('App\SocialAccount');
    }
    public function posts(){
      return $this->belongsTO('App\Post');
    }
    public function Comments(){
      return $this->hasMany('App\Comment')
    }
}
