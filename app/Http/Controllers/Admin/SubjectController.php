<?php

namespace App\Http\Controllers\Admin;

use App\ExelTemplate\SubjectMarkReport;
use App\Http\Controllers\Controller;
use App\Student;
use App\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * SubjectController constructor.
     */
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    public function timetable()
    {
        $timetable=DB::table('timetable')->get();
        return view('admin.timetable_show',compact('timetable'));
    }

    public function store_timetable()
    {
        try{
            DB::beginTransaction();
            $timetable=request('timetable');
            foreach ($timetable as $row){
                DB::table('timetable')->whereSoTiet($row['so_tiet'])->whereType($row['type'])->update($row);
            }
            DB::commit();
            Cache::forever('timetable-date',Carbon::now()->toDateString());
            return 1;
        }
        catch(\Exception $exception){
            DB::rollback();
            return $exception->getMessage();
        }
    }

    public function mark_number()
    {
        $subjects=Subject::all();
        return view('admin.mark_number_show',compact('subjects'));
    }

    public function store_mark_number()
    {
        $data=request('mark_number');
        $index=0;
        foreach ($data as $row){



            if (!is_numeric($row['numberOfM'])&&!empty($row['numberOfM'])
                || !is_numeric($row['numberOf15P'])&&!empty($row['numberOf15P'])
                || !is_numeric($row['numberOf45P'])&&!empty($row['numberOf45P'])
                || !is_numeric($row['numberOfHK'])&&!empty($row['numberOfHK'])){
                return "Số điểm phải là kiểu chữ số";
            }

                foreach ($row as $key=>$value){
                    if ($value==''){
                        $data[$index][$key]=DB::raw('NULL');
                    }

                }
                $index++;

        }


        try{
            foreach ($data as $row){
                $subject=Subject::find($row['id']);
                $subject->name=$row['name'];
                $subject->numberOfM=$row['numberOfM'];
                $subject->numberOf15P=$row['numberOf15P'];
                $subject->numberOf45P=$row['numberOf45P'];
                $subject->numberOfHK=$row['numberOfHK'];
                $subject->save();
            }

            return 1;
        }catch (\Exception $exception){
            return $exception->getMessage();
        }

    }

    public function exportSubjectReport($id,SubjectMarkReport $report){
        $subject=Subject::find($id);
        $report->sheet('Bảng điểm môn học '.$subject->name,function ($sheet)use($subject){
            $sheet->appendRow(['STT','Mã HS','Họ tên','M1','M2','M3','M4','15P1','15P2','15P3','15P4','45P1','45P2','45P3','45P4','HK']);
            $students=Student::with('marks')->get();
            $index=0;
            foreach ($students as $student){
            $index++;
                $marks=$student->marks->where('subject_id',$subject->id)->first();
                $sheet->appendRow([
                $index,
                $student->code,
                $student->first_name.' '.$student->last_name,
                $marks->H1M1,
                $marks->H1M2,
                $marks->H1M3,
                $marks->H1M4,
                $marks->H1G1,
                $marks->H1G2,
                $marks->H1G3,
                $marks->H1G4,
                $marks->H2G1,
                $marks->H2G2,
                $marks->H2G3,
                $marks->H2G4,
                $marks->HK,
            ]);
            }
            $sheet->row(1,function ($row){
                $row->setBackground('#d3e2d4');
            });
            $sheet->setAllBorders('thin');
        })->download('xlsx');
    }
}
