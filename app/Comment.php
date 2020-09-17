<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = [
    'body'
  ];
  public function post(){
    return $this->belongsTO('App\Post');
  }
  public function user(){
    return $this->belongsTO('App\User');
  }
}
