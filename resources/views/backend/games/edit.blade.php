@extends('layouts.app')

@section('content')
    @message
    <div class="card text-white bg-dark mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title d-flex align-items-center">Aktualizuj gre - {{$game->name}}</h5>
        </div>
        <div class="card-body">
            <form action="{{route('App::games.update', [$game])}}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Nazwa</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                           placeholder="Nazwa" value="{{ old('name', $game->name) }}">
                </div>
                <div class="form-group">
                    <label for="description">Opis</label>
                    <textarea class="form-control" id="description" name="description"
                              rows="3">{{ old('description', $game->description) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Zapisz</button>
                <button type="button" class="btn btn-default"><a href="{{route('App::games.index')}}">Anuluj</a>
                </button>
            </form>
        </div>
    </div>
@endsection
