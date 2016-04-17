<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Phrase;

class RhymeController extends Controller
{
    public function save(Request $request, Phrase $phrase){
        $validation = $this->validate($request, [
            'phrase' => 'bail|required',
            'rhyme' => 'bail|required'
        ]);

        $phrase = Phrase::firstOrCreate(['text' => $request->phrase]);
        $rhyme = Phrase::firstOrCreate(['text' => $request->rhyme]);

        return $phrase->associateRhyme($rhyme);

        return [$phrase, $rhyme];
    }
}
