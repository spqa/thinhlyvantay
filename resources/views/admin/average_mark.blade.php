@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="card-panel">
            <div class="row">
                <div class="col s12">
                    <a class='dropdown-button btn btn-space hide-on-small-only' href='#' data-activates='class-list'>Chọn
                        lớp</a>
                    <a class='col s12 dropdown-button btn btn-space hide-on-med-and-up right' href='#'
                       data-activates='class-list'>Chọn lớp</a>
                    <ul id='class-list' class='dropdown-content'>
                        @foreach($classnames as $classname)
                            <li>
                                <a href="{!! route('mark.index').'?classname='.$classname->name !!}">{{$classname->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col s12 ">
                    <h5 class="green-text">Điểm trung bình lớp {{$class_filter->name}} </h5>
                    <table id="timetable-data"
                           class="bordered striped centered responsive-table no-radius parent-timetable">
                        <thead class="blue darken-4 white-text">
                        <tr>
                            <th data-field="id" width="10%">STT</th>
                            <th>Họ và tên</th>
                            <th>Ngày sinh</th>
                            @foreach($subjects as $subject)
                                <th>{{$subject->name}}</th>
                            @endforeach
                            <th>TBM</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$student->last_name.' '.$student->first_name }}</td>
                                <td>{{empty($student->birthDate)?'':$student->birthDate->format('d-m-Y')}}</td>
                                @foreach($subjects as $subject)
                                    <td>{{!empty($temp=$student->marks->where('subject_id',$subject->id)->first())?$temp->TBM:''}}</td>
                                @endforeach
                                <td>{{round($student->marks->avg('TBM'),2)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection
@section('page_script')

@endsection