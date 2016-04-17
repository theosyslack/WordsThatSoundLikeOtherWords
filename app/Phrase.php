<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rhyme;

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

    $rhyme = Rhyme::where(['phrase_id' => $phrase->id, 'other_phrase_id' => $rhymingPhrase->id,]);
    $inverseRhyme = Rhyme::where(['phrase_id' => $phrase->id, 'other_phrase_id' => $rhymingPhrase->id,]);

    if ($rhyme->count() || $inverseRhyme->count()){
      return [$phrase, $rhymingPhrase];
    }

    $phrase->rhymes()->save($rhymingPhrase);
    $rhymingPhrase->rhymes()->save($phrase);

      return [$phrase, $rhymingPhrase];
  }
  public function __toString(){
    return $this->text;
  }
}
