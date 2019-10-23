@extends('layouts.app')

@section('content')
    <div class="home-page jumbotron jumbotron-fluid bg-dark">
        <div class="container text-center">
            <img class="big-logo" src="{{asset('img/logo.png')}}">
            <h1 class="display-4">Witaj w panelu zarządzania</h1>
            <p class="lead">
                W tym miejscu możesz zarządzać produktami widocznymi na stronie oraz przeglądać dokonane zamówienia.
            </p>
        </div>
    </div>
@endsection
