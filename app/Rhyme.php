<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rhyme extends Model
{
  public function timestamp(){
    return $this->hasOne('App\Timestamp');
  }
  public function __toString(){
    return $this->text;
  }
}
