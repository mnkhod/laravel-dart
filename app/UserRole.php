<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
  public function users(){
    return $this->belongsToMany('App\User','user_role_id');
  }
}
