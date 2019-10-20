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
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="#">

</head>

<body>

<div class="outer">

    <div class="navigation">
        <a href="#">Menu</a>
    </div>
    <div class="sidebar">
        <!--LOGO-->
        <div class="logo">
            <a href="#"><img src="img/logogf.png" alt="gamefly.pl"></a>
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
        <!-- nawigacja -->
        <div class="menu">
            <li class="item" id="messages">
                <a href="#" class="btn"></i>Odkrywaj</a>
            </li>

            <li class="item" id="settings">
                <a href="#settings" class="btn"></i>Kategorie</a>
                <div class="smenu">
                    <a href="">Akcji</a>
                    <a href="">Wyścigi</a>
                </div>
            </li>
        </div>

        <!-- sekcja logowania -->
        <div class="login">
        </div>
    </div>


    <!-- sekcja główna -->

    <div class="main">

        <div id="carousel-example-generic" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <div class="item active">
                </div>

                <!-- TOP -->
                <div class="service">
                    <h3 class='strikearound'>TOP</h3>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <!-- Service item -->
                            <div class="service-item animated">
                                <i class="icon-camera skyblue"></i>
                                <!-- Service item heading -->
                                <h4><a href="#">Neque perspiciatis</a></h4>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id ests.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="service-item animated">
                                <i class="icon-envelope nblue"></i>
                                <h4><a href="#">Finibus perspiciatis</a></h4>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium totam remo.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="service-item animated">
                                <i class="icon-download blue"></i>
                                <h4><a href="#">Cicero perspiciatis</a></h4>
                                <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself pain.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="service-item animated">
                                <i class="icon-gamepad green"></i>
                                <h4><a href="#">Malorum perspiciatis</a></h4>
                                <p>At vero eos et accusamus et iusto odio dignissimos qui blanditiis praesentium itate none.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Koniec topu -->
        <!-- NEWS -->
        <div class="service">
            <h3 class='strikearound'>NEWS</h3>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <!-- Service item -->
                    <div class="service-item animated">
                        <i class="icon-camera skyblue"></i>
                        <!-- Service item heading -->
                        <h4><a href="#">Neque perspiciatis</a></h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id ests.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="service-item animated">
                        <i class="icon-envelope nblue"></i>
                        <h4><a href="#">Finibus perspiciatis</a></h4>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium totam remo.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="service-item animated">
                        <i class="icon-download blue"></i>
                        <h4><a href="#">Cicero perspiciatis</a></h4>
                        <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself pain.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="service-item animated">
                        <i class="icon-gamepad green"></i>
                        <h4><a href="#">Malorum perspiciatis</a></h4>
                        <p>At vero eos et accusamus et iusto odio dignissimos qui blanditiis praesentium itate none.</p>
                    </div>
                </div>
            </div>
            <!-- Koniec NEEWS -->

            <!-- Stopka -->
            <footer>
                <div class="row">
                    <div class="col-md-12">
                        <hr />
                        <br />
                        <p class="text-center">Copyright 2019</a></p>
                        <br />
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Javascript files -->
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.arbitrary-anchor.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>
    <script src="{{ asset('js/html5shiv.js') }}"></script>
    <script src={{ asset('js/custom.js') }}""></script>
</body>
</html>
