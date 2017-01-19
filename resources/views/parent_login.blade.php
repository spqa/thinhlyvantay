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
                    <h5 class="green-text">Thời khóa biểu - Lớp 11A4 - có tác dụng từ 11-02-2017</h5>
                    <table class="bordered striped centered responsive-table no-radius">
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
                        <tr>
                            <td>Tiết 1</td>
                            <td>Văn</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                        </tr>
                        <tr>
                            <td>Tiết 2</td>
                            <td>Văn</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                        </tr>
                        <tr>
                            <td>Tiết 3</td>
                            <td>Văn</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                        </tr>
                        <tr>
                            <td>Tiết 4</td>
                            <td>Văn</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                        </tr>
                        <tr>
                            <td>Tiết 5</td>
                            <td>Văn</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                        </tr>
                        <tr>
                            <td colspan="7">Chiều</td>
                        </tr>
                        <tr>
                            <td>Tiết 1</td>
                            <td>Văn</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                        </tr>
                        <tr>
                            <td>Tiết 2</td>
                            <td>Văn</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                        </tr>
                        <tr>
                            <td>Tiết 3</td>
                            <td>Văn</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                        </tr>
                        <tr>
                            <td>Tiết 4</td>
                            <td>Văn</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                        </tr>
                        <tr>
                            <td>Tiết 5</td>
                            <td>Văn</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                            <td>Toán</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
                <div class="col s12 m4">
                    <h5 class="green-text">Số đầu điểm môn học</h5>
                    <table class="bordered striped centered responsive-table no-radius">
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
                        <tr>
                            <td>1</td>
                            <td>Anh</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection


