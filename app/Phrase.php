<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phrase extends Model
{
  public function rhymes(){
    return $this->belongsToMany('App\Phrase', 'rhymes', 'phrase_id', 'other_phrase_id');
  }
  public function __toString(){
    return $this->text;
  }
}
