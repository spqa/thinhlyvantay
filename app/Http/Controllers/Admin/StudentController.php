<?php

namespace App\Http\Controllers\Admin;

use App\Classname;
use App\Http\Controllers\Controller;
use App\Mark;
use App\Student;
use App\Subject;
use Faker\Factory;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        $classnames = Classname::all();
        $students = Classname::first()->students()->with('marks')->get();
        return view('admin.student_index', compact('subjects', 'classnames', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classnames = Classname::all();
        return view('admin.student_create', compact('classnames'));
    }

    /**
     *
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'classname' => 'required',
        ]);
        while (true) {
            $code = Factory::create()->numberBetween($min = 1000, $max = 9999);
            $temp = Student::whereCode('A' . $code)->first();
            if (!isset($temp)) {
                break;
            }
        }

        $student = Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'code' =>'A'.$code,
            'classname_id'=>$request->classname
        ]);
        $student->marks()->save(new Mark([
            'subject_id'=>1
        ]));
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $student=Student::whereCode($id)->first();
            if (isset($student)){
                $student->marks()->delete();
                $student->delete();
                return 1;
            }else{
                return "Không tìm thấy mã HS";
            }
        }
        catch (\Exception $exception){
            return $exception->getMessage();
        }

    }
}
