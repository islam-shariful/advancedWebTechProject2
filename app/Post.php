<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
    'title','content','published'
  ];

  public function user(){
    return $this->belongsTO('App\User');
  }
  public function Comments(){
    return $this->hasMany('App\Comment')
  }
}
