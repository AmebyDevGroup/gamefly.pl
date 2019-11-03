@extends('layouts.app')

@section('content')
    @message
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
                                @if($game->getFirstMedia('poster'))
                                    <img src="{{$game->getFirstMedia('poster')->getUrl('info-bg')}}">
                                @else
                                    <img src="https://via.placeholder.com/150">
                                @endif
                            </div>
                            <div class="px-3 d-flex flex-grow-1 flex-column justify-content-between"
                                 style="height: 150px">
                                <h6 class="card-title-category flex-grow-0">{{$game->category->name}}</h6>
                                <h5 class="card-title flex-grow-0">{{$game->name}}</h5>
                                <h6 class="flex-grow-0">
                                    @if($game->active)
                                        <span class="badge badge-success">Aktywny</span>
                                    @endif
                                    @if($game->sale)
                                        <span class="badge badge-danger">Wyprzedaż</span>
                                    @endif
                                    @if($game->preorder)
                                        <span class="badge badge-primary">Przedsprzedaż</span>
                                    @endif
                                </h6>
                                <h6 class="card-title-category flex-grow-0">Edytowano: {{$game->updated_at}}</h6>
                                <p class="card-text flex-grow-1">
                                    @if($game->introtext)
                                        {{$game->introtext}}
                                    @else
                                        @if(strlen($game->fulltext)>450)
                                            {{substr($game->fulltext,0,450)}}...
                                        @else
                                            {{$game->fulltext}}
                                        @endif
                                    @endif
                                </p>
                            </div>
                            <div class="pl-3 flex-column">
                                {{--                                <button type="button" class="btn-action btn btn-secondary btn-sm my-1 d-block disabled">--}}
                                {{--                                    <i class="fas fa-eye"></i>--}}
                                {{--                                </button>--}}
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


