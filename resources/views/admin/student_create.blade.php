@extends('layouts.admin')
@section('content')
    <div class="container">
        @if($errors->count()>0)
            <section>
                <div class="card-panel red lighten-3 white-text ">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </section>
            @endif

        <section>
            <div class="card-panel transparent z-depth-0 student-filter-wrap">
                <div class="row">
                    <form class="col s12 " method="post" action="{{route('student.store')}}">
                        {{csrf_field()}}
                        <div class="input-field col s6">
                            <input name="first_name" id="first_name" type="text" class="validate">
                            <label for="first_name">Tên</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="last_name" id="last_name" type="text" class="validate">
                            <label for="last_name">Họ</label>
                        </div>
                        <div class="input-field col s6">
                            <input placeholder="Ngày sinh *" type="date" name="birth_date" class="datepicker">
                        </div>
                        <div class="input-field col s6">
                            <select id="class-select" name="classname">
                                <option value="" disabled selected>Chọn lớp</option>
                                @foreach($classnames as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                            </select>
                            <label for="class-select">Chọn Lớp</label>
                        </div>
                        <div class="col s12">
                            <input class="btn right green" type="submit" value="Lưu" >
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    @endsection

@section('page_script')
    <script>
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });
    </script>
@endsection
