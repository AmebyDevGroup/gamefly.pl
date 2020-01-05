@extends('layouts.master')

@section('content')

    <h1>REZERWACJA</h1>

    Gra: {{$game->name}}<br/>
    Cena: {{$game->price}}<br/>
    Czas trwania wypożyczenia: 1 miesiąc <br/>

    <form method="POST" action="{{route('Front::reservate', [$category,$game,auth()->user()])}}">
        @csrf
        <input type="hidden" name="game_id" value="{{$game->id}}">
        <button type="submit" class="wypozycz">WYPOŻYCZ</button>
    </form>

@endsection
