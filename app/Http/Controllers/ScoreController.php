<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Student;
use App\Score;

class ScoreController extends Controller
{
	public function editDefault() {

		$scores = DB::table('scores')
		->join('students', 'scores.student_id', '=', 'students.id')
		->select('scores.score', 'students.name', 'students.id')
		->where('scores.score_type', '=', 'hw')
		->where('scores.week', '=', '1')
		->orderby('students.name', 'asc')
		->get();
		if(count($scores)==0) {
			$scores = DB::table('students')
			->select('name', 'id')
			->orderby('name', 'asc')
			->get();
		}
		return view('editScores', compact(['scores']));
	}

	public function edit(Request $request) {
		$scores = DB::table('scores')
		->join('students', 'scores.student_id', '=', 'students.id')
		->select('students.name', 'scores.score', 'students.id')
		->where('scores.score_type', '=', $request->type)
		->where('scores.week', '=', $request->week)
		->orderby('students.name', 'asc')
		->get();
		if(count($scores)==0) {
			$scores = DB::table('students')
			->select('students.name', 'students.id')
			->orderby('name', 'asc')
			->get();
		}
		return view('editScores', compact(['scores', 'request']));
	}

	public function update(Request $request) {
		$week = $request->week;
		$type = $request->type;

		for($i = 0; $i < $request->student_count; $i++) {
			$score = Score::where('week', $week)
										->where('score_type', $type)
										->where('student_id', $request->input('student'.$i))
										->first();
			if(isset($score)) {
				$score->score = $request->input('score'.$i);
			} else {
				$score = new Score;
				$score->week = $week;
				$score->score_type = $type;
				$score->student_id = $request->input('student'.$i);
				$score->score = $request->input('score'.$i);
			}
			$score->save();
		}
		return redirect('scores/edit')->withInput($request->only(['week','type']));
	}
}
