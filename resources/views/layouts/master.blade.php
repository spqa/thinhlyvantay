<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

{{--    <link rel="stylesheet" href="{{asset('css/dataTables.material.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body class="grey lighten-4">

{{--nav bar--}}
<nav>
    <div class="nav-wrapper indigo darken-3">
        <a href="/" class="brand-logo center">Thinhly</a>
        <a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            @if(auth()->check())
                <li><a href="{{route('logout')}}">Login</a></li>
            @else
                <li><a href="{{route('login')}}">Login</a></li>
            @endif

        </ul>
        <ul class="side-nav" id="mobile">
            @if(auth()->check())
                <li><a href="{{route('logout')}}">Login</a></li>
            @else
                <li><a href="{{route('login')}}">Login</a></li>
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
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>