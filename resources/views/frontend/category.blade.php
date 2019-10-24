@extends('layouts.master')

@section('content')
    <h3 class='strikearound'>{{$category->name}}</h3>
    @if($category->games->count())
        <div class="col-xs-12">
            @foreach($category->games as $game)
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <!-- Service item -->
                    <div class="service-item animated" style="height: 300px;">
                        <i class="icon-camera skyblue"></i>
                        <!-- Service item heading -->
                        <h4><a href="{{$game->getUrl()}}">{{$game->name}}</a></h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id
                            ests.</p>
                    </div>
                </div>
            @endforeach
            @for($i = 0; $i < 20; $i++)
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <!-- Service item -->
                    <div class="service-item animated" style="height: 300px;">
                        <i class="icon-camera skyblue"></i>
                        <!-- Service item heading -->
                        <h4><a href="{{$game->getUrl()}}">{{$game->name}}</a></h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit anim id
                            ests.</p>
                    </div>
                </div>
            @endfor

        </div>
    @else
        <div class="col-xs-12">
            Nie znaleziono gier w tej kategorii...
        </div>
    @endif
@endsection
