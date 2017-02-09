@extends('layouts.master')
@section('content')
    <div class="container ">
        <div class="section login-section">
            <div class="card-panel">
                <h3>Điền mã học sinh</h3>
                <div class="row">
                    <form class="col s12" method="post" action="{{route('student.info')}}">
                        {{csrf_field()}}
                        <div class="row ">
                            <div class="input-field col s12 m8 ">
                                <input name="student_code" type="text" placeholder="mã học sinh ...">
                                @if(request()->session()->has('student_404'))
                                    <span class="red-text">
                                    {{session('student_404')}}
                                </span>
                                @endif
                            </div>
                            <div class="submit col s12 m4">
                                <input type="submit" class="btn" value="Tra Điểm">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card-panel">
            <div class="row">
                <div class="col s12 m8">
                    <h5 class="green-text">Thời khóa biểu - Lớp 11A4 - có tác dụng từ {{!empty(cache('timetable-date'))?cache('timetable-date'):date("Y-m-d")}}</h5>
                    <table class="bordered striped centered responsive-table no-radius parent-timetable">
                        <thead class="blue darken-4 white-text">
                        <tr>
                            <th data-field="id" width="10%">Tiết</th>
                            <th>Thứ 2</th>
                            <th>Thứ 3</th>
                            <th>Thứ 4</th>
                            <th>Thứ 5</th>
                            <th>Thứ 6</th>
                            <th>Thứ 7</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td colspan="7">Sáng</td>
                        </tr>
                        @foreach($timetable->where('type',0) as $row)
                            <tr data-sotiet="{{$row->so_tiet}}" data-type="{{$row->type}}">
                                <td>Tiết {{$row->so_tiet}}</td>
                                <td data-content="thu2" contenteditable="true">{{$row->thu2}}</td>
                                <td data-content="thu3" contenteditable="true">{{$row->thu3}}</td>
                                <td data-content="thu4" contenteditable="true">{{$row->thu4}}</td>
                                <td data-content="thu5" contenteditable="true">{{$row->thu5}}</td>
                                <td data-content="thu6" contenteditable="true">{{$row->thu6}}</td>
                                <td data-content="thu7" contenteditable="true">{{$row->thu7}}</td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="7">Chiều</td>
                        </tr>
                        @foreach($timetable->where('type',1) as $row)
                            <tr data-sotiet="{{$row->so_tiet}}" data-type="{{$row->type}}">
                                <td>Tiết {{$row->so_tiet}}</td>
                                <td data-content="thu2" contenteditable="true">{{$row->thu2}}</td>
                                <td data-content="thu3" contenteditable="true">{{$row->thu3}}</td>
                                <td data-content="thu4" contenteditable="true">{{$row->thu4}}</td>
                                <td data-content="thu5" contenteditable="true">{{$row->thu5}}</td>
                                <td data-content="thu6" contenteditable="true">{{$row->thu6}}</td>
                                <td data-content="thu7" contenteditable="true">{{$row->thu7}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="col s12 m4">
                    <h5 class="green-text">Số đầu điểm môn học</h5>
                    <table class="bordered striped centered responsive-table no-radius parent-timetable">
                        <thead class="blue darken-4 white-text">
                        <tr>
                            <th>STT</th>
                            <th>Môn học</th>
                            <th>M (HS1)</th>
                            <th>15P (HS1)</th>
                            <th>45P (HS2)</th>
                            <th>HK (HS3)</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subjects as $subject)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$subject->name}}</td>
                                <td>{{$subject->numberOfM}}</td>
                                <td>{{$subject->numberOf15P}}</td>
                                <td>{{$subject->numberOf45P}}</td>
                                <td>{{$subject->numberOfHK}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection


