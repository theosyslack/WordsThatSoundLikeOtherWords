<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Phrase;
use App\Timestamp;
use App\Submitter;

class RhymeController extends Controller
{
    public function save(Request $request, Phrase $phrase){
        //
        $validation = $this->validate($request, [
            'phrase' => 'bail|required',
            'rhyme' => 'bail|required'
        ]);

        $timestamp = [];
        $submitter = [];

        if(!empty($request->timestamp)){
          $timestamp = Timestamp::firstOrCreate($request->timestamp);
        }

        if(!empty($request->submitter)){
          $submitter = Submitter::firstOrCreate($request->submitter);
        }

        $phrase = Phrase::firstOrCreate(['text' => $request->phrase]);
        $rhyme = Phrase::firstOrCreate(['text' => $request->rhyme]);

        $phraseWithRhymes = $phrase->associateRhyme($rhyme, $timestamp, $submitter);
    }


}
