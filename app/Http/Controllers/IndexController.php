<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function parent_login_show(){
        return view('parent_login');

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
