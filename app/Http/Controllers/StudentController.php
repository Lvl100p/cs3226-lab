<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Support\Facades\DB;

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
            $item->mcCss = $item->mc == $highestMc? "highest-of-column": '';
            $item->tcCss = $item->tc == $highestTc? "highest-of-column": '';
            $item->speCss = $item->spe == $highestSpe? "highest-of-column": '';
            $item->hwCss = $item->hw == $highestHw? "highest-of-column": '';
            $item->bsCss = $item->bs == $highestBs? "highest-of-column": '';
            $item->ksCss = $item->ks == $highestKs? "highest-of-column": '';
            $item->acCss = $item->ac == $highestAc? "highest-of-column": '';
            $item->dilCss = $item->dil == $highestDil? "highest-of-column": '';

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

        return view('index', [
            'students' => $students
        ]);
    }

    public function show($id)
    {

        $student = Student::find($id);

        return view('detail', [
            'student' => $student
        ]);
    }
}
