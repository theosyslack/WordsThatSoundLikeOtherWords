<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timestamp extends Model
{
  public function rhymes(){
    return $this->belongsToMany('App\Rhymes');
  }
}
