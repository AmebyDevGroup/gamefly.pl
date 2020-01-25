@extends('layouts.master')

@section('content')
    <div class="service">
        <h3 class='strikearound'>Profil</h3>

        <div>
            <img class="avatar" src={{ asset('img/avatar.png') }} alt="avatar">
            <h2 class="username">{{$user->name}}</h2>
            <h3> {{$user->email}}</h3>
        </div>

        <h3 class='strikearound'>Moje gry</h3>

        @foreach($user->games()->where('front_user_games_item.expired', 0)->get() as $game)
            <div class="col-md-3 col-sm-6 col-xs-6">
                <!-- Service item -->
                <div class="service-item animated">
                    @if($game->game->getFirstMedia('poster'))
                        <img src="{{$game->game->getFirstMedia('poster')->getUrl('thumb')}}">
                    @else
                        <img src="https://via.placeholder.com/150x200">
                @endif
                <!-- Service item heading -->
                    <div>
                        <h4><a href="{{$game->game->getUrl()}}">{{$game->game->name}}</a></h4>
                        <p>
                            Twój Klucz:<br/><b>{{$game->pivot->key}}</b><br/>
                            Dostępna do: {{$game->pivot->expired_at}}<br/>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
