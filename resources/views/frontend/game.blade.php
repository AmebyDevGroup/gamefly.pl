@extends('layouts.master')

@section('content')
    <h3 class='strikearound'>{{$game->name}}</h3>
    @foreach($category->games as $game)
        <div class="game-page"style="background-image:url({{$game->getFirstMedia('poster')->getUrl('')}})"></div>
        <div class="item-page">
            <div>
                @if($game->getFirstMedia('poster'))
                    <img class="game-poster" src="{{$game->getFirstMedia('poster')->getUrl('')}}">
                @else
                    <img src="https://via.placeholder.com/356x474">
                @endif
                <p class="description">{{$game->description}}</p>
            </div>
         </div>
    @endforeach
@endsection
