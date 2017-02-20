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

Route::get('/scores/edit', function() {
	$scores = DB::table('scores')
            ->join('students', 'scores.student_id', '=', 'students.id')
            ->select('students.name', 'scores.score')
            ->where('scores.score_type', '=', 'hw')
            ->where('scores.week', '=', '1')
            ->orderby('students.name', 'asc')
            ->get();
	return view('editScores', compact(['scores']));
});