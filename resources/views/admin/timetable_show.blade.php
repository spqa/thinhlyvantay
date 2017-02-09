@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="card-panel">
            <div class="row">
                <div class="col s12 ">
                    <h5 class="green-text">Thời khóa biểu - Lớp 11A4 - có tác dụng từ {{cache('timetable-date')}}</h5>
                    <table id="timetable-data" class="bordered striped centered responsive-table no-radius parent-timetable">
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
                <div class="col s12">
                    <button id="btn-save-timetable" class="btn-space btn right">Lưu</button>
                </div>
            </div>
        </div>

    </div>

@endsection


@section('page_script')
    <script type="application/javascript">
        $(document).ready(function () {
            var dataArray=[];


            $('#btn-save-timetable').click(function (e) {
//                console.log($editedRow.first().attr('data-sotiet'));
//                $editedRow.
                $editedRow=$('#timetable-data').find('tr[data-edited]').each(function (index) {
                    var data=$(this).find('td[data-content]');
                    var row={};
                    row.so_tiet=$(this).attr('data-sotiet');
                    row.type=$(this).attr('data-type');
                    row.thu2=data.eq(0).text();
                    row.thu3=data.eq(1).text();
                    row.thu4=data.eq(2).text();
                    row.thu5=data.eq(3).text();
                    row.thu6=data.eq(4).text();
                    row.thu7=data.eq(5).text();
                    dataArray.push(row);
                });

                $.ajax({
                    type:"POST",
                    data:{
                        timetable:dataArray
                    },
                    success:function (data) {
                        if (data!=1){
                            Materialize.toast(data, 4000);
                        }else{
                            location.reload();
                        }
                    }
                });
                console.log(dataArray);
            });
        });
    </script>
    @endsection