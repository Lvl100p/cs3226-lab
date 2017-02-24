<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'StudentController@index');

Route::get('/help', function() {
    return view('help');
});

Route::resource('students', 'StudentController', ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);

Route::get('/scores/edit', 'ScoreController@editDefault');
Route::post('/scores/edit', 'ScoreController@edit');
Route::put('/scores/edit', 'ScoreController@update');

Route::get('/achievements', function() {
    return view('achievements');
});

Route::post('/achievements', function(Request $request) {
    $requestedAchvId = $request->input('achievement');
    $achv = App\Achievement::find($requestedAchvId);
    $achvName = $achv->name;
    $requestedTier = $request->input('tier');
    $maxTier = $achv->max_tier;
    
    if ($requestedTier > $maxTier) {
        $msg = "Achievement '$achvName' does not have a tier of '$requestedTier'.";
        return view('achievements', ['msg' => $msg, 'defaultAchv' => $requestedAchvId, 'defaultTier' => $requestedTier]);
    }

    // Get the students with the requested achievement id and tier
    $earned = DB::table('earned')->where('achievement_id', '=', $request->input('achievement'))
        ->where('tier', '=', $request->input('tier'))
        ->get();
    
    $students = array();
    foreach ($earned as $earn) {
        $students[] = App\Student::find($earn->student_id);
    }

    return view('achievements', ['students' => $students, 'defaultAchv' => $requestedAchvId, 'defaultTier' => $requestedTier]);
});

Auth::routes();

Route::get('/home', 'HomeController@index');
