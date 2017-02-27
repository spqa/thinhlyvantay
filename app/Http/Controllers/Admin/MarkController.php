<?php

namespace App\Http\Controllers\Admin;

use App\Classname;
use App\Http\Controllers\Controller;
use App\Mark;
use App\Student;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classname = request('classname');
        $classnames = Classname::all();
        if (!empty($classname)) {
            $class_filter = Classname::whereName($classname)->firstOrFail();
        } else {
            $class_filter = Classname::first();

        }
        $students = $class_filter->students;
        $students->load('marks');
        $subjects = Subject::all();
        return view('admin.average_mark', compact('class_filter', 'students', 'subjects', 'classnames'));
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
        try{
            $data=$request->data;
//            dd($data);
            $subject_id=$data['subject'];
            $students=$data['student'];
            DB::beginTransaction();
            foreach ($students as $student){
                foreach ($student['marks'] as $key=> $value){
                    if ($value==''){
                        $student['marks'][$key]=DB::raw('NULL');
                    }

                }
                $mark = Mark::firstOrCreate([
                    'subject_id'=>$subject_id,
                    'student_id'=>$student['student']
                ]);

                $mark->H1M1=$student['marks']['H1M1'];
                $mark->H1M2=$student['marks']['H1M2'];
                $mark->H1M3=$student['marks']['H1M3'];
                $mark->H1M4=$student['marks']['H1M4'];
                $mark->H1G1=$student['marks']['H1G1'];
                $mark->H1G2=$student['marks']['H1G2'];
                $mark->H1G3=$student['marks']['H1G3'];
                $mark->H1G4=$student['marks']['H1G4'];
                $mark->H2G1=$student['marks']['H2G1'];
                $mark->H2G2=$student['marks']['H2G2'];
                $mark->HK=$student['marks']['HK'];
                $mark->TBM=$student['marks']['TBM'];
                $mark->save();
            }
            DB::commit();
        }catch (\Exception $ex){
            DB::rollback();

            return $ex->getMessage();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($class,$subject)
    {
        $students=Student::with(['marks'=>function ($query)use($subject){
            $query->where('subject_id',$subject);
        }])->where('classname_id',$class)->get();
//        foreach ($students as $student){
//            $student->mark=$student->marks()->where('subject_id',$subject)->first();
//        }
        return $students;
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
}
