@extends('layouts.master')
@section('content')

    <div class="container">

        <div class="section ">
            <div class="card-panel">
                <h6>Mã học sinh : A156 </h6>
                <h6>Họ và tên : Nguyễn Văn A </h6>
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
                    <tr>
                        <td>1</td>
                        <td>Công nghệ</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                    </tr>

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
                            <li class="collection-item">Số ngày nghỉ<span class="badge red white-text">20</span></li>
                            <li class="collection-item">Số ngày đi học muộn <span
                                        class="badge red white-text"> 15</span></li>
                        </ul>
                    </div>
                    <div class="col s12">
                        <p>sadasdasdasdasda s sf s sf ds  dfsfds  s fs</p>
                    </div>
                </div>
            </div>

        </div>

    </div>



@endsection