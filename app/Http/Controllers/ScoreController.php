<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Student;

class ScoreController extends Controller
{
	public function editDefault() {
		
		$scores = DB::table('scores')
		->join('students', 'scores.student_id', '=', 'students.id')
		->select('scores.score', 'students.name')
		->where('scores.score_type', '=', 'hw')
		->where('scores.week', '=', '1')
		->orderby('students.name', 'asc')
		->get();
		if(count($scores)==0) {
			$scores = DB::table('students')
			->select('name')
			->orderby('name', 'asc')
			->get();
		}
		return view('editScores', compact(['scores']));
	}

	public function edit(Request $request) {
		$scores = DB::table('scores')
		->join('students', 'scores.student_id', '=', 'students.id')
		->select('students.name', 'scores.score')
		->where('scores.score_type', '=', $request->type)
		->where('scores.week', '=', $request->week)
		->orderby('students.name', 'asc')
		->get();
		if(count($scores) == 0) {
			$scores = DB::table('students')
			->select('students.name')
			->orderby('name', 'asc')
			->get();
		}
		return view('editScores', compact(['scores', 'request']));
	}
}
