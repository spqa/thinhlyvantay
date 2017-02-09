@extends('layouts.admin')
@section('content')
    <div class="container">
        <section>
            <div class="card-panel transparent z-depth-0 ">
                <div class="row">
                    <div class="col s12 ">
                        <a class='dropdown-button btn' href='#' data-activates='class-list'>Chọn lớp</a>
                        <a class=' btn teal right' href='{{route('student.create')}}' >Thêm học sinh</a>
                        <a class=' btn red right' href="#modal1">Xóa học sinh</a>
                        <button class='btn-save-student-info btn green right'>Save</button>
                        <div class="progress hide">
                            <div class="indeterminate"></div>
                        </div>
                        <ul id='class-list' class='dropdown-content'>
                            @foreach($classnames as $classname)
                                <li><a data-content="{{$classname->id}}"
                                       href="{{route('class.show',['id'=>$classname->id])}}">{{$classname->name}}</a>
                                </li>
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
                <div class="card-title">{{$classname->name}}</div>
                <table class="bordered highlight centered no-radius" id="note-table">
                    <thead class="white-text green darken-1">
                    <tr>
                        <th width="5%" data-field="id">STT</th>
                        <th width="6%" data-field="id">Mã HS</th>
                        <th width="10%" data-field="name">Họ</th>
                        <th width="15%">Tên</th>
                        <th>Số ngày muộn</th>
                        <th>Số ngày nghỉ</th>
                        <th width="40%">Ghi chú</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr data-id="{{$student->id}}">
                            <td>{{$loop->index+1}}</td>
                            <td>{{$student->code}}</td>
                            <td data-content="last_name" contenteditable="true">{{$student->last_name}}</td>
                            <td data-content="first_name" contenteditable="true">{{$student->first_name}}</td>
                            <td data-content="late" contenteditable="true">{{$student->late}}</td>
                            <td data-content="absent" contenteditable="true">{{$student->absent}}</td>
                            <td data-content="note" contenteditable="true">{{$student->note}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Xóa học sinh</h4>
            <p>Điền mã HS muốn xóa: </p>
            <input id="delete-student-code" type="text">
        </div>
        <div class="modal-footer">
            <a id="delete-student" class=" red white-text modal-action modal-close waves-effect waves-red btn-flat">Xóa</a>
            <a href="#!" class=" modal-action modal-close waves-effect waves-grey btn-flat">Hủy</a>
        </div>
    </div>
@endsection

@section('page_script')
    <script type="application/javascript">
        $(document).ready(function () {
            $(document).ready(function () {
                $('#delete-student').click(function (e) {
                    console.log('haha');
                    e.preventDefault();
                    $.ajax({
                        url:'/admin/student/'+$('#delete-student-code').val(),
                        type:'DELETE',
                        success:function (data) {
                            $('#modal1').modal('close');
                            if (data!=1){
                                Materialize.toast(data,4000);
                            }else{
                                Materialize.toast('Đã xóa '+$('#delete-student-code').val());
                            }
                        }
                    });
                });
            });
            $('.btn-save-student-info').click(function (e) {
                var dataArray=[];
                $('#note-table').find('tr[data-edited]').each(function (index) {
                    var row={};
                    var rowdata=$(this).find('td[data-content]');
                    row.id=$(this).attr('data-id');
                    row.last_name=rowdata.eq(0).text();
                    row.first_name=rowdata.eq(1).text();
                    row.late=rowdata.eq(2).text();
                    row.absent=rowdata.eq(3).text();
                    row.note=rowdata.eq(4).text();
                    dataArray.push(row);
                });
                $.ajax({
                    url:'/admin/save-student-info',
                    type:"POST",
                    data:{student_info:dataArray},
                    success:function (data) {
                        if (data!=1){
                            Materialize.toast(data, 4000);
                        }else{
                            Materialize.toast("Đã lưu", 4000);
//                            location.reload();
                        }
                    }
                });
                console.log(dataArray);
            });
        });
    </script>
    @endsection
