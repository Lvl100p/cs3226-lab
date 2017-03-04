<?php

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
Route::get('students/{students}/scores', 'StudentController@getScores');
Route::get('students/{students}/weeklySums', 'StudentController@getWeeklySums');

Route::get('/scores/edit', 'ScoreController@editDefault');
Route::post('/scores/edit', 'ScoreController@edit');
Route::put('/scores/edit', 'ScoreController@update');

Route::get('/achievements', 'AchievementController@index');
Route::post('/achievements', 'AchievementController@getStudents');

Auth::routes();
