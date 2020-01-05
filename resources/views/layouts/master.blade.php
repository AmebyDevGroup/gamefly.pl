<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,600' rel='stylesheet'
          type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700,300italic' rel='stylesheet'
          type='text/css'>

    <!-- Styles -->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700,300italic' rel='stylesheet'
          type='text/css'>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}?{{date('ymdhis')}}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
</head>

<body>
<div class="outer">
    @auth
        @if(!auth()->user()->hasVerifiedEmail())
            <div class="not-verified">
                Aby w pełni korzystać z serwisu potwierdź swój adres email!
            </div>
    @endif
@endauth
<!-- Menu boczne -->
    <div class="sidebar">
        @include('frontend.sidebar')
    </div>

    <!-- sekcja główna -->
    <div class="main">
        @yield('content')
    </div>

    <!-- Stopka -->
    <footer>
        <p>© <?php echo date("Y"); ?> Copyright.<a href="https://github.com/KrzychuW">#KW</a><a
                href="https://github.com/WerVa">#JW</a></p>
    </footer>
</div>
<!-- Javascript files -->
<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.arbitrary-anchor.js') }}"></script>
<script src="{{ asset('js/waypoints.min.js') }}"></script>
<script src="{{ asset('js/respond.min.js') }}"></script>
<script src="{{ asset('js/html5shiv.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<!---CloudTag-->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/plugins/wordCloud.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<script src="{{ asset('js/cloudtag.js') }}"></script>
@yield('scripts')
</body>
</html>
