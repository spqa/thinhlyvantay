<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <title>Admin Panel</title>
    {{--    <link rel="stylesheet" href="{{asset('css/dataTables.material.css')}}">--}}
    <link rel="stylesheet" href="//cdn.jsdelivr.net/fontawesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css?v=0.1')}}">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#283593">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="_token" content="{{csrf_token()}}" >
</head>

<body class="grey lighten-4">

{{--nav bar--}}
<header>

<nav>
    <div class="nav-wrapper indigo darken-3">
        <a href="/" class="brand-logo center">Admin Panel</a>
        <a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            @if(auth()->check())
                <form method="post" action="{{route('logout')}}">
                    {{csrf_field()}}
                    <li><a href="#"><input class="btn" type="submit" value="Log out"></a></li>
                </form>
            @else
                <li><a class="btn red" href="{{route('login')}}">Log in</a></li>
            @endif

        </ul>
        <ul class="side-nav fixed" id="mobile">
            <li class="grey-text"><h2>Thinhly</h2></li>
            <li><a class="{{Route::currentRouteName()=='student.index'?'indigo darken-3 white-text':''}}" href="{{route('student.index')}}"><i class="fa fa-list-ul black-text" aria-hidden="true"></i> Quản lý điểm </a></li>
            {{--<li class="no-padding">--}}
                {{--<ul class="collapsible collapsible-accordion">--}}
                    {{--<li>--}}
                        {{--<a class="collapsible-header">Quản lý học sinh<i class="material-icons">arrow_drop_down</i></a>--}}
                        {{--<div class="collapsible-body">--}}
                            {{--<ul>--}}
                                {{----}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            <li><a class="{{Request::is('admin/class*')?'indigo darken-3 white-text':''}}" href="{{route('class.index')}}"><i class="fa fa-id-card-o black-text" aria-hidden="true"></i> Thông tin học sinh</a></li>
            <li><a class="{{Route::currentRouteName()=='timetable.show'?'indigo darken-3 white-text':''}}" href="{{route('timetable.show')}}"><i class="fa fa-calendar black-text" aria-hidden="true"></i> Thời khóa biểu</a></li>
            <li><a class="{{Route::currentRouteName()=='mark_number.show'?'indigo darken-3 white-text':''}}" href="{{route('mark_number.show')}}"><i class="fa fa-list-ul black-text" aria-hidden="true"></i> Số đầu điểm</a></li>
            <li><a class="{{Route::currentRouteName()=='class.list'?'indigo darken-3 white-text':''}}" href="{{route('class.list')}}"><i class="fa fa-list-ul black-text" aria-hidden="true"></i> Quản lý lớp</a></li>
            @if(auth()->check())
                <form method="post" action="{{route('logout')}}">
                    {{csrf_field()}}
                    <li><a href="#"><input class="btn" type="submit" value="Log out"></a></li>
                </form>
            @else
                <li><a href="{{route('login')}}">Log in</a></li>
            @endif
        </ul>
    </div>
</nav>
</header>
{{--end nav bar--}}
<main>
@yield('content')
</main>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

<script src="{{asset('js/jquery.dataTables.js')}}"></script>
<script src="{{asset('js/dataTables.material.js')}}"></script>
<script src="{{asset('js/script.js?v=0.1')}}"></script>
@yield('page_script')
</body>
</html>