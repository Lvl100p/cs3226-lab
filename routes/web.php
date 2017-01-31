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

Route::get('/', function () {
    return view('index', [
        'students' => factory(App\Student::class, 100)->make()
    ]);
});

Route::get('/help', function() {
    return view('help');
});

Route::get('/students/1', function(){
    return view('student1', [
        'student' => factory(App\Student::class, 1)->make()
    ]);
});