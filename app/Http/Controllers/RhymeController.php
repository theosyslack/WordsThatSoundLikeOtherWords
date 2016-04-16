<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RhymeController extends Controller
{
    public function save(Request $request){
        $validation = $this->validate($request, [
            'phrase' => 'bail|required',
            'rhyme' => 'bail|required'
        ]);
         
        return $validation; 
    }
}
