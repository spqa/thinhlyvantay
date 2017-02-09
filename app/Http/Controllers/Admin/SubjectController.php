<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
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
}
