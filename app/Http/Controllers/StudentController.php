<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = factory(Student::class, 100)->make();
        return view('index', [
            'students' => $students
        ]);
    }

    public function show($id){

        $student = factory(Student::class, 1)->make();

        return view('detail', [
            'student' => $student
        ]);
    }
}
