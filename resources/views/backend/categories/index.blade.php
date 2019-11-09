@extends('layouts.app')

@section('content')
    @message
    <div class="card text-white bg-dark mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title d-flex align-items-center">Lista gier</h5>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link btn btn-success" href="{{route('App::categories.create')}}">Nowy</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <ul class="list-unstyled">
                @foreach($categories as $category)
                    <div class="card mb-3 text-white bg-dark">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <img src="https://via.placeholder.com/150">
                            </div>
                            <div class="px-3 flex-grow-1">
                                <h5 class="card-title">{{$category->name}}</h5>
                                <p class="card-text">{{$category->description}}</p>
                            </div>
                            <div class="pl-3 flex-column">
                                <button type="button" class="btn-action btn btn-secondary btn-sm my-1 d-block disabled">
                                    <i class="fas fa-eye"></i>
                                </button>

                                <a href="{{route('App::categories.edit', [$category])}}">
                                    <button type="button" class="btn-action btn btn-info btn-sm my-1 d-block">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </a>

                                <button type="button" class="btn-action btn btn-danger btn-sm my-1 d-block"
                                        onclick="event.preventDefault();
                                            document.getElementById('deleteForm{{$category->id}}}}').submit();">
                                    <i class="fas fa-trash"></i>
                                    <form id="deleteForm{{$category->id}}}}"
                                          action="{{ route('App::categories.destroy', [$category]) }}" method="POST"
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
        {{ $categories->links('backend.pagination') }}
    </div>
@endsection


