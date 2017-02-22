@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="card-panel">
            <div class="row">
                <div class="col s12">
                    <a class='dropdown-button btn green hide-on-small-only right add-class' href='#'>Thêm lớp</a>
                    <a class='dropdown-button btn red hide-on-small-only right delete-class' href='#'>Xoá lớp</a>
                    <a class='col s12 dropdown-button green btn hide-on-med-and-up add-class' href='#'>Thêm lớp</a>
                    <a class='col s12 dropdown-button red btn hide-on-med-and-up delete-class' href='#'>Xóa lớp</a>
                </div>

                <div class="col s12 class-form hide">
                    <form method="post" action="{{route('class.store')}}">
                        {{csrf_field()}}
                        <div class="">
                            <div class="input-field col s12 m6">
                                <input name="classname" placeholder="Placeholder" id="classname" type="text"
                                       class="validate">
                                <label for="classname">Điền tên lớp</label>
                                <input class="btn red" type="submit" value="Lưu">
                            </div>
                        </div>

                    </form>
                </div>
                @if(session('status')==1)
                    <div class="col s12">
                        <div class="card-panel green lighten-3">
                            <p>Đã thêm lớp</p>
                        </div>
                    </div>
                @endif

                <div class="col s12 ">
                    <h5 class="green-text">Danh sách lớp </h5>
                    <table id="timetable-data"
                           class="bordered striped centered responsive-table no-radius parent-timetable">
                        <thead class="blue darken-4 white-text">
                        <tr>
                            <th data-field="id" width="10%">STT</th>
                            <th>Lớp</th>
                            <th>Sĩ số</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($classnames as $classname)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$classname->name}}</td>
                                <td>{{$classname->students()->count()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>

    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Xóa lớp</h4>
            <p>Danh sách học sinh của lớp muốn xóa sẽ bị xóa theo, bạn có chắc chắn?</p>
            <form>
                <div class="input-field col s12 m6">
                    <input id="delete-class" type="text" placeholder="điền tên lớp muốn xóa" required>

                </div>
            </form>
        </div>
        <div class="modal-footer">
            <a href="#!" class="delete-action red modal-action white-text modal-close waves-effect waves-green btn-flat">Xóa</a>
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Hủy</a>
        </div>
    </div>
@endsection
@section('page_script')
    <script>
        $('.add-class').click(function (e) {
            e.preventDefault();
            $('.class-form').toggleClass('hide');
        });
        $('.delete-class').click(function (e) {
            e.preventDefault();
            $('#modal1').modal('open');
//
        });

        $('.delete-action').click(function (e) {
            $.ajax({
                url:'/admin/class/'+$('#delete-class').val(),
                method:'DELETE',
                success:function (data) {
                    location.reload();
                    console.log('hah');
                },
                error:function () {
                    Materialize.toast('Đã có lỗi xảy ra!');
                }
            });
        });
    </script>
@endsection