<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rhyme extends Model
{
  public function __toString(){
    return $this->text;
  }
}
