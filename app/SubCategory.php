<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
  public function top_category(){
    return $this->belongsTo('App\Product',"sub_category_id");
  }
}
