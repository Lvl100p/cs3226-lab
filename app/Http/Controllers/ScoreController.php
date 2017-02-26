<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Student;
use App\Score;

class ScoreController extends Controller
{
	public function editDefault() {
		$scores = $this->getScores('mc', 1);
		return view('editScores', compact(['scores']));
	}

	public function edit(Request $request) {
		$scores = $this->getScores($request->type, $request->week);
		return view('editScores', compact(['scores', 'request']));
	}

	public function update(Request $request) {
		$week = $request->week;
		$type = $request->type;

		for($i = 0; $i < $request->student_count; $i++) {
			$score = Score::where('week', $week)
										->where('student_id', $request->input('student'.$i))
										->first();
			if(isset($score)) {
				$score->$type = $request->input('score'.$i);
			} else {
				$score = new Score;
				$score->week = $week;
				$score->$type = $request->input('score'.$i);
				$score->student_id = $request->input('student'.$i);
			}
			$score->save();
		}

		$scores = $this->getScores($type, $week);

		return redirect('scores/edit')->withInput($request->only(['week','type']));
	}

	private function getScores($type, $week) {
		$scores = DB::table('scores')
		->join('students', 'scores.student_id', '=', 'students.id')
		->select('students.name', 'scores.'.$type, 'students.id')
		->where('scores.week', '=', $week)
		->orderby('students.name', 'asc')
		->get();
		
		if(count($scores)==0) {
			$scores = DB::table('students')
			->select('students.name', 'students.id')
			->orderby('name', 'asc')
			->get();
		}
		return $scores;
	}
}
