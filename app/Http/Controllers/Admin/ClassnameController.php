<?php

namespace App\Http\Controllers\Admin;

use App\Classname;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassnameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classname=Classname::first();
        $classnames=Classname::all();
        $students=$classname->students()->get();
        return view('admin.class_show',compact('students','classnames','classname'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classname=Classname::findOrFail($id);
        $classnames=Classname::all();
        $students=$classname->students()->get();
        return view('admin.class_show',compact('students','classnames','classname'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function save_student_info(){
        $student_info=request('student_info');
        $index=0;
        foreach ($student_info as $row){

            if (!is_numeric($row['absent'])&&!empty($row['absent'])
                || !is_numeric($row['late'])&&!empty($row['late'])){
                return "Sai kiểu chữ số";
            }

            foreach ($row as $key=>$value){
                if ($value==''){
                    $student_info[$index][$key]=DB::raw('NULL');
                }

            }
            $index++;
        }
        try{
            foreach ($student_info as $row){
                $student=Student::find($row['id']);
                $student->last_name=$row['last_name'];
                $student->first_name=$row['first_name'];
                $student->absent=$row['absent'];
                $student->late=$row['late'];
                $student->note=$row['note'];
                $student->save();
            }
            return 1;
        }catch(\Exception $exception){
            return $exception->getMessage();

        }


    }
}
