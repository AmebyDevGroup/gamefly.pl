@extends('layouts.app')

@section('content')
    @message
    <div class="card text-white bg-dark mb-3">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title d-flex align-items-center">Nowa gra</h5>
        </div>
        <div class="card-body">
            <form action="{{route('App::games.store')}}" method="post">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="name">Nazwa</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="name"
                                   placeholder="Nazwa" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="code">Identyfikator</label>
                            <input type="text" class="form-control" id="code" name="code" aria-describedby="code"
                                   placeholder="Identyfikator" value="{{ old('code') }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Cena</label>
                            <input type="text" class="form-control" id="price" name="price" aria-describedby="price"
                                   placeholder="Cena" value="{{ old('price') }}">
                        </div>


                        <div class="form-check">
                            <input type="hidden" value="0" name="active">
                            <input class="form-check-input" type="checkbox" value="1" name="active" id="active"
                                   @if(old('active')) checked @endif >
                            <label class="form-check-label" for="active">
                                Aktywna
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="hidden" value="0" name="preorder">
                            <input class="form-check-input" type="checkbox" value="1" name="preorder" id="preorder"
                                   @if(old('preorder')) checked @endif >
                            <label class="form-check-label" for="preorder">
                                Przedsprzedaż
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="hidden" value="0" name="sale">
                            <input class="form-check-input" type="checkbox" value="1" name="sale" id="sale"
                                   @if(old('sale')) checked @endif >
                            <label class="form-check-label" for="sale">
                                Wyprzedaż
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                            <div class="foto-upload">
                                <label for="poster">Dodaj okładkę</label>
                                <div class="wrapper">
                                    <label class="label" for="poster">Dodaj okładkę</label>
                                    <div class="input">
                                        <input name="poster" id="poster" class="file" type="file">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category">Kategoria</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                            @if(old('category_id') == $category->id) selected @endif >
                                        {{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="description">Opis</label>
                            <textarea class="form-control" id="description" name="description"
                                      rows="3">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </form>
        </div>
    </div>
@endsection
