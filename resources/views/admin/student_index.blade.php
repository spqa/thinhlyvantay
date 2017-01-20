@extends('layouts.admin')
@section('content')
    <div class="container">
        <section>
            <div class="card-panel transparent z-depth-0 student-filter-wrap">
                <div class="row">
                    <div class="col s12">
                        <a class='dropdown-button btn' href='#' data-activates='choose-class' >Chọn lớp</a>
                        <a class='dropdown-button btn' href='#' data-activates='choose-subject'>Chọn môn </a>
                        <a class='dropdown-button btn right red' href='#'>Lưu lại </a>
                        <div class="progress hide">
                            <div class="indeterminate"></div>
                        </div>
                        <ul id='choose-class' class='dropdown-content'>
                            @foreach($classnames as $classname)
                                <li><a data-content="{{$classname->id}}" href="#">{{$classname->name}}</a></li>
                            @endforeach
                        </ul>

                        <ul id='choose-subject' class='dropdown-content'>
                            @foreach($subjects as $subject)
                                <li><a data-content="{{$subject->id}}" href="#">{{$subject->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </section>
    </div>
    <div class="container-fluid">
        <section>
            <div class="card-panel overflow-y">
                <table class="bordered highlight centered no-radius" id="st-tbl-mark-fe">
                    <thead class="white-text green darken-1">
                    <tr>
                        <th width="5%" data-field="id" rowspan="2">STT</th>
                        <th width="10%" data-field="name" rowspan="2">Tên học sinh</th>
                        <th colspan="4">M</th>
                        <th colspan="4">15</th>
                        <th colspan="2">45</th>
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
                        <th>1</th>
                        <th>1</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$student->last_name.' '.$student->first_name}}</td>
                            <td data-type="H1" contenteditable="true">{{$student->marks->where('subject_id',$subjects->first()->id)->first()->H1M1}}</td>
                            <td data-type="H1" contenteditable="true">{{$student->marks->where('subject_id',$subjects->first()->id)->first()->H1M2}}</td>
                            <td data-type="H1" contenteditable="true">{{$student->marks->where('subject_id',$subjects->first()->id)->first()->H1M3}}</td>
                            <td data-type="H1" contenteditable="true">{{$student->marks->where('subject_id',$subjects->first()->id)->first()->H1M4}}</td>
                            <td data-type="H1" contenteditable="true">{{$student->marks->where('subject_id',$subjects->first()->id)->first()->H1G1}}</td>
                            <td data-type="H1" contenteditable="true">{{$student->marks->where('subject_id',$subjects->first()->id)->first()->H1G2}}</td>
                            <td data-type="H1" contenteditable="true">{{$student->marks->where('subject_id',$subjects->first()->id)->first()->H1G3}}</td>
                            <td data-type="H1" contenteditable="true">{{$student->marks->where('subject_id',$subjects->first()->id)->first()->H1G4}}</td>
                            <td data-type="H2" contenteditable="true">{{$student->marks->where('subject_id',$subjects->first()->id)->first()->H2G1}}</td>
                            <td data-type="H2" contenteditable="true">{{$student->marks->where('subject_id',$subjects->first()->id)->first()->H2G2}}</td>
                            <td data-type="H3" contenteditable="true">{{$student->marks->where('subject_id',$subjects->first()->id)->first()->HK}}</td>
                            <td data-type="TBM">{{$student->marks->where('subject_id',$subjects->first()->id)->first()->TBM}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection