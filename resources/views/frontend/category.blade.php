@extends('layouts.master')

@section('content')
    <h3 class='strikearound'>{{$category->name}}</h3>
    @if($category->games->count())
        <div class="row">
            @foreach($category->games as $game)
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <!-- Service item -->
                    <div class="service-item animated">
                        <i class="icon-camera skyblue"></i>
                        <!-- Service item heading -->
                        <h4><a href="#">{{$game->name}}</a></h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id
                            ests.</p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="row">
            <div class="col-xs-12">
                Nie znaleziono gier w tej kategorii...
            </div>
        </div>
    @endif
@endsection
