<?php

use App\Phrase;
use App\Rhyme;
use Http\Requests;
use Http\Controllers;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $rhyme = Rhyme::with(['submitter', 'timestamp'])->orderByRaw("RAND()")->first();

    if ($rhyme) {
      $rhyme->phrases = $rhyme->phrases();
      $data = [
            'rhyme' => $rhyme
      ];
      return view('welcome', ['data' => $data]);
    } else {
      $data = [
            'rhyme' => [],
            'phrases' => []
      ];
      return view('welcome', ['data' => $data]);
    }


});

Route::post('/', 'RhymeController@save');


Route::get('/episodes', function(Request $request){

});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
