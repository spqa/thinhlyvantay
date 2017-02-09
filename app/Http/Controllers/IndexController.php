<?php

namespace App\Http\Controllers;

use App\Student;
use App\Subject;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function parent_login_show(){
        $subjects = Subject::all();
        $timetable=DB::table('timetable')->get();
        return view('parent_login',compact('subjects','timetable'));

    }

    public function student_info(){
        $student_code=request('student_code');
        $student=Student::with('marks','classname')->whereCode($student_code)->first();
        if (!isset($student)){
            request()->session()->flash('student_404','Mã sinh viên không đúng !');

            return back();
        }
        return view('student_info',compact('student'));
    }
}
