<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phrase extends Model
{
  protected $fillable = ['text'];

  public function rhymes(){
    return $this->belongsToMany('App\Phrase', 'rhymes', 'phrase_id', 'other_phrase_id');
  }
  public function rhyme(){
    return $this->rhymes()->take(1);
  }
  public function associateRhyme(Phrase $rhymingPhrase){
    $phrase = $this;
    $phrase->save();
    $rhymingPhrase->save();
    $phrase->rhymes()->save($rhymingPhrase);
    $rhymingPhrase->rhymes()->save($phrase);

    return $phrase;
  }
  public function __toString(){
    return $this->text;
  }
}
