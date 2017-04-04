@extends('layouts.master')
@section('title',$student->first_name.' | Thinhly')
@section('content')

    <div class="container">

        <div class="section ">
            <div class="card-panel">
                <h6>Mã học sinh : {{$student->code}} </h6>
                <h6>Họ và tên : {{$student->last_name.' '.$student->first_name}} </h6>
            </div>
            <div class="card-panel mark-section">
                <div class="card-title">
                    <h5>Điểm </h5>
                </div>
                <table class="bordered highlight centered" id="st-tbl-mark-fe">
                    <thead class="white-text green darken-1">
                    <tr>
                        <th width="5%" data-field="id" rowspan="2">STT</th>
                        <th width="10%" data-field="name" rowspan="2">Môn học</th>
                        <th colspan="4">M</th>
                        <th colspan="4">15</th>
                        <th colspan="4">45</th>
                        <th>HK</th>
                        <th>TBM</th>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>1</th>
                        <th>1</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($student->marks as $mark)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$mark->subject->name}}</td>
                            <td>{{$mark->H1M1}}</td>
                            <td>{{$mark->H1M2}}</td>
                            <td>{{$mark->H1M3}}</td>
                            <td>{{$mark->H1M4}}</td>
                            <td>{{$mark->H1G1}}</td>
                            <td>{{$mark->H1G2}}</td>
                            <td>{{$mark->H1G3}}</td>
                            <td>{{$mark->H1G4}}</td>
                            <td>{{$mark->H2G1}}</td>
                            <td>{{$mark->H2G2}}</td>
                            <td>{{$mark->H2G3}}</td>
                            <td>{{$mark->H2G4}}</td>
                            <td>{{$mark->HK}}</td>
                            <td>{{$mark->TBM}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="section note-section">
            <div class="card-panel">
                <div class="card-title">
                    <h5>Chuyên cần</h5>
                </div>
                <div class="row">
                    <div class="col m6 s12">
                        <ul class="collection">
                            <li class="collection-item">Số ngày nghỉ<span
                                        class="badge red white-text">{{$student->absent}}</span></li>
                            <li class="collection-item">Số ngày đi học muộn <span
                                        class="badge red white-text"> {{$student->late}}</span></li>
                        </ul>
                    </div>
                    <div class="col s12">
                        <p>{{$student->note}}</p>
                    </div>
                </div>
            </div>

        </div>

    </div>



@endsection