@extends('layouts.master')

@section('content')
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
    <h3 class='strikearound'>{{$game->name}}</h3>
        <div class="game-page"style="background-image:url({{$game->getFirstMedia('poster')->getUrl('')}})"></div>
        <div class="item-page">
            <div>
                <div class="description">
                @if($game->getFirstMedia('poster'))
                    <img class="game-poster" src="{{$game->getFirstMedia('poster')->getUrl('')}}">
                @else
                    <img src="https://via.placeholder.com/356x474">
                @endif
                    <div class="mainbox">
                        <h2>Ocena</h2>
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Fantastyczne - 5 gwiazdek"></label>
                            <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Bardzo dobre - 4.5 gwiazdki"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Dobre  - 4 gwiazdki"></label>
                            <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 gwiazdki"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Od biedy - 3 stars"></label>
                            <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Takie sobie - 2.5 gwiazdki"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Ujdzie - 2 stars"></label>
                            <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 gwiazdki"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Słabe - 1 gwiazdki"></label>
                            <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Dno - 0.5 gwiazdki"></label>
                        </fieldset>
                        <br/>   <br/>
                        <button class="wypozycz">WYPOŻYCZ</button>
                        <img class="pegi" src="https://pegi.info/sites/default/files/styles/medium/public/2017-03/2000px-PEGI_3.svg_.png?itok=v29cXS0R"/>
                    </div>
                    <div class="text"><hr>{!!$game->fulltext!!}</div>
                </div>
            </div>
         </div>
@endsection
