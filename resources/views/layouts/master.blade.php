<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <title>@yield('title','Website xem điểm của thầy Thịnh dạy Lý')</title>
{{--    <link rel="stylesheet" href="{{asset('css/dataTables.material.css')}}">--}}

    <link rel="stylesheet" href="//cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css?v=0.2')}}">
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
<nav>
    <div class="nav-wrapper indigo darken-3">
        <a href="/" class="brand-logo center">Thinhly</a>
        <a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            @if(auth()->check())
                <li><a class="btn green" href="{{route('student.index')}}">Admin</a></li>
                <form style="display: inline" method="post" action="{{route('logout')}}">
                    {{csrf_field()}}
                    <li><a href="#"><input class="btn" type="submit" value="Log out"></a></li>
                </form>
            @else
                <li><a class="btn red" href="{{route('login')}}">Login</a></li>
            @endif

        </ul>
        <ul class="side-nav" id="mobile">
            @if(auth()->check())
                <form style="display: inline" method="post" action="{{route('logout')}}">
                    {{csrf_field()}}
                    <li><a href="#"><input class="btn" type="submit" value="Log out"></a></li>
                </form>
            @else
                <li><a href="{{route('login')}}">Log in</a></li>
            @endif
        </ul>
    </div>
</nav>

{{--end nav bar--}}

@yield('content')

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
<script src="{{asset('js/jquery.dataTables.js')}}"></script>
<script src="{{asset('js/dataTables.material.js')}}"></script>
<script src="//cdn.datatables.net/fixedheader/3.1.2/js/dataTables.fixedHeader.min.js"></script>

<script src="{{asset('js/script.js?v=0.3')}}"></script>
</body>
</html>