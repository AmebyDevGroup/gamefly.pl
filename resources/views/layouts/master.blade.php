<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700,300italic' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700,300italic' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

</head>

<body>

<div class="outer">
    <div class="sidebar">
        <!--LOGO-->
        <div class="logo">
            <a href="{{url('/')}}">
                <img src="img/logogf.png" alt="gamefly.pl">
            </a>
        </div>
        <!--szukajka-->
        <div class="sidebar-search">
            <form>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Szukaj gry">
                    <span class="input-group-btn">
                         <button type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
        <div id="sidebar-menu">
            <!-- nawigacja -->
            @include('frontend.menu')
        </div>
        <!-- sekcja logowania -->
        <li class="item" id="zaloguj">
            <a href="{{ route('Front::login') }}" class="btn"></i>Zaloguj</a>
        </li>
    </div>


    <!-- sekcja główna -->

    <div class="main">
    @yield('content')

    <!-- Stopka -->
        <footer>
            <div class="row">
                <div class="col-md-12">
                    <hr/>
                    <br/>
                    <p class="text-center">Copyright 2019</p>
                    <br/>
                </div>
            </div>
        </footer>
    </div>
</div>
    <!-- Javascript files -->
    <!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.arbitrary-anchor.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>
    <script src="{{ asset('js/html5shiv.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
