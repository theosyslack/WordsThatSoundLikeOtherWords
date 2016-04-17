<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rhyme;
use App\Timestamp;
use App\Submitter;

class Phrase extends Model
{
  protected $fillable = ['text'];

  public function rhymes(){
    return $this->belongsToMany('App\Phrase', 'rhymes', 'phrase_id', 'other_phrase_id');
  }
  public function rhyme(){
    return $this->rhymes()->take(1);
  }
  public function associateRhyme(Phrase $rhymingPhrase, $timestamp = null, $submitter = null){
    $phrase = $this;


    $phrase->rhymes()->sync([$rhymingPhrase->id]);
    $rhymingPhrase->rhymes()->sync([$phrase->id]);

    $rhyme = Rhyme::where(['phrase_id' => $phrase->id, 'other_phrase_id' => $rhymingPhrase->id])->first();
    $inverseRhyme = Rhyme::where(['phrase_id' => $rhymingPhrase->id, 'other_phrase_id' => $phrase->id])->first();


    if ($submitter){
      $rhyme->submitter()->associate($submitter);
      $inverseRhyme->submitter()->associate($submitter);
    }
    if ($timestamp){
      $rhyme->timestamp()->associate($timestamp);
      $inverseRhyme->timestamp()->associate($timestamp);
    }

    $rhyme->save();
    $inverseRhyme->save();

    return $rhyme;
  }
  public function __toString(){
    return $this->text;
  }
}
