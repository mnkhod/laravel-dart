<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  protected $fillable = ['title','user_id','category_id','images','content'];

  public function user(){
    return $this->belongsTo('App\User');
  }

  public function category(){
    return $this->belongsTo('App\BlogCategory');
  }
}
