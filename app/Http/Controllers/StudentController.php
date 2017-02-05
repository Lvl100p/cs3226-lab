<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return view('index', [
            'students' => $students
        ]);
    }

    public function show($id){

        $student = Student::find($id);

        return view('detail', [
            'student' => $student
        ]);
    }
}
