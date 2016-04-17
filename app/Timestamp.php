<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timestamp extends Model
{
  protected $fillable = ['host', 'episode', 'timestamp'];
  public function rhymes(){
    return $this->belongsToMany('App\Rhymes');
  }
}
