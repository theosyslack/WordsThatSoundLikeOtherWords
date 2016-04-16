<?php

use App\Phrase;
use Http\Requests;
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
    $phrase = Phrase::with(['rhyme'])->orderByRaw("RAND()")->first();
    $rhymes = $phrase->rhymes;
    return view('welcome', ['phrase' => $phrase, 'rhymes' => $rhymes]);
});

Route::post('/', function (Request $request) {
    dd($request);
    return ['message' => 'Yo, we saved your shitty rhyme.'];
});


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
