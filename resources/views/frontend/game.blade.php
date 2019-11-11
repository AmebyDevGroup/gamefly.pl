@extends('layouts.master')

@section('content')
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
    <h3 class='strikearound'>{{$game->name}}</h3>
    @if($game->getFirstMedia('poster'))
        <div class="game-page"style="background-image:url({{$game->getFirstMedia('poster')->getUrl('')}})"></div>
    @endif
        <div class="item-page">
            <div>
                <div class="description">
                @if($game->getFirstMedia('poster'))
                    <img class="game-poster" src="{{$game->getFirstMedia('poster')->getUrl('')}}">
                @else
                        <img class="game-poster" src="https://via.placeholder.com/356x474">
                @endif
                    <div class="mainbox">
                        <h2>Ocena</h2>
                        <form action="{{route('Front::rate',[$category, $game])}}" method="post">
                            <fieldset class="rating" @guest disabled @endguest>
                                <input type="radio" id="star5" name="rating" value="5"
                                       @if($game->rate->rounded_rate == 5) checked @endif/><label class="full"
                                                                                                  for="star5"
                                                                                                  title="Fantastyczne - 5 gwiazdek"></label>
                                <input type="radio" id="star4half" name="rating" value="4.5"
                                       @if($game->rate->rounded_rate == 4.5) checked @endif/><label class="half"
                                                                                                    for="star4half"
                                                                                                    title="Bardzo dobre - 4.5 gwiazdki"></label>
                                <input type="radio" id="star4" name="rating" value="4"
                                       @if($game->rate->rounded_rate == 4) checked @endif/><label class="full"
                                                                                                  for="star4"
                                                                                                  title="Dobre  - 4 gwiazdki"></label>
                                <input type="radio" id="star3half" name="rating" value="3.5"
                                       @if($game->rate->rounded_rate == 3.5) checked @endif/><label class="half"
                                                                                                    for="star3half"
                                                                                                    title="Meh - 3.5 gwiazdki"></label>
                                <input type="radio" id="star3" name="rating" value="3"
                                       @if($game->rate->rounded_rate == 3) checked @endif/><label class="full"
                                                                                                  for="star3"
                                                                                                  title="Od biedy - 3 stars"></label>
                                <input type="radio" id="star2half" name="rating" value="2.5"
                                       @if($game->rate->rounded_rate == 2.5) checked @endif/><label class="half"
                                                                                                    for="star2half"
                                                                                                    title="Takie sobie - 2.5 gwiazdki"></label>
                                <input type="radio" id="star2" name="rating" value="2"
                                       @if($game->rate->rounded_rate == 2) checked @endif /><label class="full"
                                                                                                   for="star2"
                                                                                                   title="Ujdzie - 2 stars"></label>
                                <input type="radio" id="star1half" name="rating" value="1.5"
                                       @if($game->rate->rounded_rate == 1.5) checked @endif/><label class="half"
                                                                                                    for="star1half"
                                                                                                    title="Mogło być lepiej - 1.5 gwiazdki"></label>
                                <input type="radio" id="star1" name="rating" value="1"
                                       @if($game->rate->rounded_rate == 1) checked @endif/><label class="full"
                                                                                                  for="star1"
                                                                                                  title="Słabe - 1 gwiazdki"></label>
                                <input type="radio" id="starhalf" name="rating" value="0.5"
                                       @if($game->rate->rounded_rate == 0.5) checked @endif/><label class="half"
                                                                                                    for="starhalf"
                                                                                                    title="Dno - 0.5 gwiazdki"></label>
                            </fieldset>
                        </form>
                        <br/>   <br/>
                        <button class="wypozycz">WYPOŻYCZ</button>
                        @if($game->pegi)
                            <img class="pegi" src="{{$game->pegi->getFirstMedia('image')->getUrl()}}"/>
                        @endif
                    </div>
                    <div class="text"><hr>{!!$game->fulltext!!}</div>
                </div>
            </div>
         </div>
@endsection
