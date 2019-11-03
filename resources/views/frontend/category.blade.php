@extends('layouts.master')

@section('content')
    <div class="service">
        <h3 class='strikearound'>{{$category->name}}</h3>
        @if($category->games->count())
            <div class="col-xs-12">
                @foreach($category->games as $game)
                @endforeach
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <!-- Service item -->
                        <div class="service-item animated">
                            @if($game->getFirstMedia('poster'))
                                <img src="{{$game->getFirstMedia('poster')->getUrl('thumb')}}">
                            @else
                                <img src="https://via.placeholder.com/150x200">
                        @endif
                            <!-- Service item heading -->
                            <h4><a href="{{$game->getUrl()}}">{{$game->name}}</a></h4>
                            <p>{{$game->description}}</p>
                        </div>
                    </div>

            </div>
        @else
            <div class="col-xs-12">
                Nie znaleziono gier w tej kategorii...
            </div>
        @endif
    </div>
@endsection
