<?php

namespace App\Http\Controllers;

use App\Score;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'getWeeklySums']]);
        $this->middleware('admin', ['except' => ['index', 'show', 'getWeeklySums']]);
    }

    public function index(Request $request)
    {
        $students = $this->getStudentInfoSortedDesc();

        // find out all the max value for each column
        $highestMc = $students->max('mc');
        $highestTc = $students->max('tc');
        $highestSpe = $students->max('spe');
        $highestHw = $students->max('hw');
        $highestBs = $students->max('bs');
        $highestKs = $students->max('ks');
        $highestAc = $students->max('ac');
        $highestDil = $students->max('dil');

        // get all the unique value of sum
        $uniqueSums = $students->unique('sum')->values();

        // get the top three highest sum and the lowest sum
        $highestSum = $uniqueSums->max('sum');
        $secondSum = $uniqueSums[1]->sum;
        $thirdSum = $uniqueSums[2]->sum;
        $lowestSum = $uniqueSums->min('sum');

        // iterate through all row, set their css if criteria met
        $students->map(function ($item, $key) use ($highestSum, $secondSum, $thirdSum, $lowestSum, $highestMc, $highestTc, $highestSpe, $highestHw, $highestBs, $highestKs, $highestAc, $highestDil) {
            $item->mcCss = $item->mc == $highestMc ? "highest-of-column" : '';
            $item->tcCss = $item->tc == $highestTc ? "highest-of-column" : '';
            $item->speCss = $item->spe == $highestSpe ? "highest-of-column" : '';
            $item->hwCss = $item->hw == $highestHw ? "highest-of-column" : '';
            $item->bsCss = $item->bs == $highestBs ? "highest-of-column" : '';
            $item->ksCss = $item->ks == $highestKs ? "highest-of-column" : '';
            $item->acCss = $item->ac == $highestAc ? "highest-of-column" : '';
            $item->dilCss = $item->dil == $highestDil ? "highest-of-column" : '';

            switch ($item->sum) {
                case $highestSum:
                    $item->sumCss = "highest-sum";
                    break;
                case $secondSum:
                    $item->sumCss = "second-sum";
                    break;
                case $thirdSum:
                    $item->sumCss = "third-sum";
                    break;
                case $lowestSum:
                    $item->sumCss = "lowest-sum";
                    break;
                default:
                    $item->sumCss = "";
                    break;
            }
        });

        // get top three students
        $first_prizes = $students->where('sum', $highestSum)->values();
        $second_prizes = $students->where('sum', $secondSum)->values();
        $third_prizes = $students->where('sum', $thirdSum)->values();

        $student_names = Student::all()
            ->transform(function ($student) {
                return $student->name;
            });

        if (!Auth::check()) {
            // if it's a guest, show only top 7
            $students = $students->take(7);
        } else if (Auth::check() && $request->user()->access == 'student') {
            // showing his/her position if he/she is outside TOP-7,
            // plus the details of up to 1 (ONE) student exactly above/below him/her (if he/she is really last, then nobody is below him/her).
            $student = $students->where('id', $request->user()->id);

            $top7 = $students->take(7);

            $studentV = $students->values();

            $studentPeeks = collect([]);

            for ($i = 0; $i < sizeof($studentV); $i++) {
                if ($studentV[$i]->id == $request->user()->id) {
                    if ($i - 1 > 0) {
                        $studentPeeks->push($studentV[$i - 1]);
                    }

                    $studentPeeks->push($studentV[$i]);

                    if (($i + 1) < sizeof($studentV)) {
                        $studentPeeks->push($studentV[$i + 1]);
                    }
                }
            }

            $students = $top7->union($studentPeeks);
        }


        $students = $students->values();

        for ($i = 0; $i < sizeof($students); $i++) {
            $students[$i]->rank = $i + 1;
        }

        return view('index', [
            'students' => $students,
            'first_prizes' => $first_prizes,
            'second_prizes' => $second_prizes,
            'third_prizes' => $third_prizes,
            'student_names' => $student_names
        ]);
    }


    public function show($id)
    {

        $student = Student::findOrFail($id);

        $top7 = $this->getStudentInfoSortedDesc()
            ->take(7);

        // don't allow guest to access student details not in top 7
        if (!Auth::check() && !$top7->contains($student)) {
            abort(403, 'Unauthorized action.');
        }

        $student->scores;
        $mc = ['sum' => 0];
        $tc = ['sum' => 0];
        $hw = ['sum' => 0];
        $bs = ['sum' => 0];
        $ks = ['sum' => 0];
        $ac = ['sum' => 0];

        foreach ($student->scores as $week) {
            $mc['sum'] = $mc['sum'] + $week['mc'];
            $tc['sum'] = $tc['sum'] + $week['tc'];
            $hw['sum'] = $hw['sum'] + $week['hw'];
            $bs['sum'] = $bs['sum'] + $week['bs'];
            $ks['sum'] = $ks['sum'] + $week['ks'];
            $ac['sum'] = $ac['sum'] + $week['ac'];

            $mc[$week->week] = $week->mc;
            $tc[$week->week] = $week->tc;
            $hw[$week->week] = $week->hw;
            $bs[$week->week] = $week->bs;
            $ks[$week->week] = $week->ks;
            $ac[$week->week] = $week->ac;
        }

        $scores = [
            'mc' => $mc,
            'tc' => $tc,
            'hw' => $hw,
            'bs' => $bs,
            'ks' => $ks,
            'ac' => $ac];

        $achievements = Student::find($id)
            ->achievements;

        return view('detail', [
            'student' => $student,
            'scores' => $scores,
            'achievements' => $achievements
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'nickname' => 'required|between:5,30',
            'fullname' => 'required|between:5,30',
            'kattisacc' => 'required|between:5,30',
            'nationality' => 'required'
        ]);

        $student = new Student();
        $student->name = $request->fullname;
        $student->nickname = $request->nickname;
        $student->email = $request->email;
        $student->flag = $request->nationality;

        $student->save();
        /*
                $ifp = fopen('img/uploads/' . $student->id . '.png', "wb");

                $data = explode(',', $request->cropped_image);

                fwrite($ifp, base64_decode($data[1]));
                fclose($ifp);
        */
        Session::flash('message', "Student " . $student->name . " created.");

        return Redirect::to('students/' . $student->id);

    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('edit', [
            'student' => $student
        ]);
    }

    public function update($id, Request $request)
    {
        $student = Student::find($id);
        $student->rank = 0;
        $student->name = $request->name;
        $student->nickname = $request->nickname;
        $student->flag = $request->flag;
        $student->mc = $request->mc;
        $student->tc = $request->tc;
        $student->spe = $request->mc + $request->tc;
        $student->hw = $request->hw;
        $student->bs = $request->bs;
        $student->ks = $request->ks;
        $student->ac = $request->ac;
        $student->dil = $request->hw + $request->bs + $request->ks + $request->ac;
        $student->sum = $student->spe + $student->dil;

        $student->save();

        Session::flash('message', "Student " . $student->name . " updated.");

        return Redirect::to('students/' . $id . '/edit');

    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        Session::flash('message', "Student " . $student->name . " deleted.");

        Student::destroy($id);

        return Redirect::to('/');
    }

    public function getScores($id)
    {
        $scores = Student::find($id)->scores;

        return $scores;
    }

    public function getWeeklySums($id)
    {
        // execute DB query to get all weekly entries for this student_id
        $scores = Score::where('student_id', $id)
            ->get();

        // transform the returning result by summing all score components
        $weeklySums = $scores->transform(function ($score) {
            $sum = $score->mc + $score->tc + $score->hw + $score->bs + $score->ks + $score->ac;

            return [
                $score->week,
                $sum
            ];
        });

        return collect($weeklySums)->toJson();

    }

    private function getStudentInfoSortedDesc()
    {
        // retrieve student data along with scores
        $students = Student::with('scores')
            ->get()
            ->map(function ($student) {
                // for each student, calculate their latest weekly score
                $latest_score = $student->scores->reduce(function ($carry, $score) {
                    if (empty($carry)) {
                        return $score;
                    } else {
                        return $score->week > $carry->week ? $score : $carry;
                    }
                });

                if (empty($latest_score)) {
                    return $student;
                }

                // assign the scores as new attributes
                $student->mc = $latest_score->mc;
                $student->tc = $latest_score->tc;
                $student->spe = $latest_score->spe;
                $student->hw = $latest_score->hw;
                $student->bs = $latest_score->bs;
                $student->ks = $latest_score->ks;
                $student->ac = $latest_score->ac;
                $student->dil = $latest_score->dil;
                $student->sum = $latest_score->sum;

                // remove bulky weekly data before transfer to client
                unset($student->scores);

                return $student;
            });

        // sort the student in descending order
        $students = $students->sortByDesc('sum');

        return $students;
    }
}
