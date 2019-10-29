@extends('layouts.app')

@section('content')
    <div class="card text-white bg-dark mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title d-flex align-items-center">Lista gier</h5>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link btn btn-success" href="{{route('App::games.create')}}">Nowy</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <ul class="list-unstyled">
                @foreach($games as $game)
                    <div class="card mb-3 text-white bg-dark">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <img src="https://via.placeholder.com/150">
                            </div>
                            <div class="px-3 flex-grow-1">
                                <h5 class="card-title">{{$game->name}}</h5>
                                <p class="card-text">{{$game->description}}</p>
                            </div>
                            <div class="pl-3 flex-column">
                                <button type="button" class="btn-action btn btn-secondary btn-sm my-1 d-block disabled">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button type="button" class="btn-action btn btn-info btn-sm my-1 d-block">
                                    <a href="{{route('App::games.edit', [$game])}}"><i class="far fa-edit"></i></a>
                                </button>
                                <button type="button" class="btn-action btn btn-danger btn-sm my-1 d-block"
                                        onclick="event.preventDefault();
                                            document.getElementById('deleteForm{{$game->id}}}}').submit();">
                                    <i class="fas fa-trash"></i>
                                    <form id="deleteForm{{$game->id}}}}"
                                          action="{{ route('App::games.destroy', [$game]) }}" method="POST"
                                          style="display: none;">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
        {{ $games->links('backend.pagination') }}
    </div>
@endsection


