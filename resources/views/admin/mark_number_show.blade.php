@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="card-panel">
            <div class="row">
                <div class="col s12 ">
                    <h5 class="green-text">Số đầu điểm môn học</h5>
                    <table id="mark-number-table" class="bordered striped centered responsive-table no-radius parent-timetable">
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
                            <tr data-id="{{$subject->id}}">
                                <td>{{$loop->index+1}}</td>
                                <td data-content="name" contenteditable="true">{{$subject->name}}</td>
                                <td data-content="numberOfM" contenteditable="true">{{$subject->numberOfM}}</td>
                                <td data-content="numberOf15P" contenteditable="true">{{$subject->numberOf15P}}</td>
                                <td data-content="numberOf45P" contenteditable="true">{{$subject->numberOf45P}}</td>
                                <td data-content="numberOfHK" contenteditable="true">{{$subject->numberOfHK}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col s12">
                    <button id="btn-save-mark-number" class="btn-space btn right">Lưu</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_script')
    <script type="application/javascript">
        $(document).ready(function () {
            $('#btn-save-mark-number').click(function (e) {
                var dataArray=[];
                $('#mark-number-table').find('tr[data-edited]').each(function (index) {
                    var row={};
                    var rowdata=$(this).find('td[data-content]');
                    row.id=$(this).attr('data-id');
                    row.name=rowdata.eq(0).text();
                    row.numberOfM=rowdata.eq(1).text();
                    row.numberOf15P=rowdata.eq(2).text();
                    row.numberOf45P=rowdata.eq(3).text();
                    row.numberOfHK=rowdata.eq(4).text();
                    dataArray.push(row);
                });
                $.ajax({
                    type:"POST",
                    data:{mark_number:dataArray},
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