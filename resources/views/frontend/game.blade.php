@extends('layouts.master')

@section('content')
    <h3 class='strikearound'>{{$game->name}}</h3>
    <div class="row">

    </div>


    <h4 class='strikearound'>Pozostałe gry z kategorii {{$category->name}}</h4>
    @foreach($category->games as $game)
        <div class="col-md-3 col-sm-6 col-xs-6">
            <!-- Service item -->
            <div class="service-item animated">
                <i class="icon-camera skyblue"></i>
                <!-- Service item heading -->
                <h4><a href="{{$game->getUrl()}}">{{$game->name}}</a></h4>
            </div>
        </div>
    @endforeach
@endsection
