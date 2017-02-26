<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class StudentController extends Controller
{
    public function index()
    {
        // retrieve data sort by sum descending order
        $students = DB::table('students')
            ->orderBy('sum', 'desc')
            ->get();

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

        return view('index', [
            'students' => $students,
            'first_prizes' => $first_prizes,
            'second_prizes' => $second_prizes,
            'third_prizes' => $third_prizes
        ]);
    }
	

    public function show($id)
    {

        $student = Student::find($id);

        return view('detail', [
            'student' => $student
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
        $student->rank = 0;
        $student->name = $request->fullname;
        $student->nickname = $request->nickname;
        $student->flag = $request->nationality;
        $student->mc = 0;
        $student->tc = 0;
        $student->spe = 0;
        $student->hw = 0;
        $student->bs = 0;
        $student->ks = 0;
        $student->ac = 0;
        $student->dil = 0;
        $student->sum = 0;

        $student->save();

        $ifp = fopen('img/uploads/' . $student->id . '.png', "wb");

        $data = explode(',', $request->cropped_image);

        fwrite($ifp, base64_decode($data[1]));
        fclose($ifp);

        Session::flash('message', "Student " . $student->name . " created.");

        return view('detail', [
            'student' => $student
        ]);

    }

    public function edit($id){
        $student = Student::find($id);
        return view('edit', [
            'student' => $student
        ]);
    }

    public function update($id, Request $request){
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
        $student->dil = $request->hw+$request->bs+$request->ks+$request->ac;
        $student->sum = $student->spe+$student->dil;

        $student->save();

        Session::flash('message', "Student " . $student->name . " updated.");

        return view('edit', [
            'student' => $student
        ]);
    }

    public function destroy($id){
        Student::destroy($id);

        return view('help');
    }
}
