@extends('layouts.app')

@section('content')
    @message
    <div class="card text-white bg-dark mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title d-flex align-items-center">Edycja gry - {{$game->name}}</h5>
        </div>
        <div class="card-body">
            <form action="{{route('App::games.update', [$game])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="name">Nazwa</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                                   placeholder="Nazwa" value="{{ old('name', $game->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="code">Identyfikator</label>
                            <input type="text" class="form-control" id="code" name="code" aria-describedby="code"
                                   placeholder="Identyfikator" value="{{ old('code', $game->code) }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Cena</label>
                            <input type="text" class="form-control" id="price" name="price" aria-describedby="price"
                                   placeholder="Cena" value="{{ old('price', $game->price) }}">
                        </div>
                        <div class="form-group">
                            <label for="category">Kategoria</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                            @if(old('category_id', $game->category_id) == $category->id) selected @endif >{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <label for="category">Opcje</label>
                            <div class="form-check">
                                <input type="hidden" value="0" name="active">
                                <input class="form-check-input" type="checkbox" value="1" name="active" id="active"
                                       @if(old('active', $game->active)) checked @endif >
                                <label class="form-check-label" for="active">
                                    Aktywna
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="hidden" value="0" name="preorder">
                                <input class="form-check-input" type="checkbox" value="1" name="preorder" id="preorder"
                                       @if(old('preorder', $game->preorder)) checked @endif >
                                <label class="form-check-label" for="preorder">
                                    Przedsprzedaż
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="hidden" value="0" name="sale">
                                <input class="form-check-input" type="checkbox" value="1" name="sale" id="sale"
                                       @if(old('sale', $game->sale)) checked @endif >
                                <label class="form-check-label" for="sale">
                                    Wyprzedaż
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <div class="foto-upload">
                                <label for="poster">Dodaj okładkę</label>
                                <div class="wrapper">
                                    <label class="label" for="poster">Dodaj okładkę</label>
                                    <div class="input">
                                        <input name="poster" id="poster" class="file" type="file"
                                               @if($game->getFirstMedia('poster'))
                                               data-image="{{$game->getFirstMedia('poster')->getUrl('info')}}"
                                               data-image_name="{{$game->getFirstMedia('poster')->name}}"
                                            @endif
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="introtext">Krótki opis</label>
                            <textarea class="form-control" id="introtext" name="introtext"
                                      rows="3">{{ old('introtext') }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="fulltext">Opis</label>
                            <textarea class="form-control" id="fulltext" name="fulltext"
                                      rows="3">{{ old('fulltext') }}</textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </form>
        </div>
    </div>
@endsection
