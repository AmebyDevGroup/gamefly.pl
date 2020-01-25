@extends('layouts.master')

@section('content')
    <h3 class='strikearound'>REZERWACJA</h3>
    @if($game->getFirstMedia('poster'))
        <div class="game-page" style="background-image:url({{$game->getFirstMedia('poster')->getUrl('')}})"></div>
    @endif

    <div class="reservation">
        @if($game->getFirstMedia('poster'))
            <img class="poster" src="{{$game->getFirstMedia('poster')->getUrl('')}}"> <br/>
        @endif

        <div class="res">
            Tytuł: <span class="gm">{{$game->name}}</span> <br/>
            Cena: &nbsp;<span class="gm">{{$game->price}} zł</span><br/>
            Czas wypożyczenia:<br/>
        </div>
        <table class="tg">
            <tr>
                <th>OD</th>
                <th rowspan="2">&#8652;</th>
                <th>DO</th>
            </tr>
            <tr>
                <td><input class="form-control" type="date"
                           value="<?php date_default_timezone_set('Europe/Warsaw'); echo date('Y-m-d'); ?>" readonly>
                </td>
                <td><input class="form-control" type="date" required></td>
            </tr>
        </table>
        <br/>
        <div class="zgoda">
            <input type="checkbox" id="cbx" style="display: none;" required>
            <label for="cbx" class="check">
                <svg width="15px" height="15px" viewBox="0 0 18 18">
                    <path
                        d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                    <polyline points="1 9 7 14 15 4"></polyline>
                </svg>
            </label>
            <span class="zgoda">Akceptuje, że to strona projektu na studia i otrzymany kod, nie jest ważny i nie może zostać użyty.</span>
        </div>
        <form method="POST" action="{{route('Front::reservate', [$category,$game,auth()->user()])}}">
        @csrf
        <input type="hidden" name="game_id" value="{{$game->id}}">
        <button type="submit" class="wypozycz">WYPOŻYCZ</button>
    </form>
    </div>
    </div>
@endsection
