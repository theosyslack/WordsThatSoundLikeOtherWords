<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Phrase;

class Rhyme extends Model{
  public function phrases(){
    $phrase = Phrase::find($this->phrase_id);
    $otherPhrase = Phrase::find($this->other_phrase_id);
    return [$phrase, $otherPhrase];
  }
  public function submitter(){
    return $this->belongsTo('App\Submitter');
  }
  public function timestamp(){
    return $this->belongsTo('App\Timestamp');
  }
  public function __toString(){
    return $this->text;
  }
}
