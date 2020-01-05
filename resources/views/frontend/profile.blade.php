@extends('layouts.master')

@section('content')
    <div class="service">
        <h3 class='strikearound'>Profil</h3>

        <div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel maximus nunc. Sed at tellus porta,
                hendrerit ante ut, euismod felis.
                Morbi non massa augue. Suspendisse sed suscipit purus. Praesent ut lorem lacinia nisl imperdiet cursus.
                In et quam non tellus mollis blandit.
                Nunc gravida malesuada euismod. Praesent mollis dolor at molestie sodales. Praesent a dignissim nunc,
                quis posuere arcu. Suspendisse eget mollis nunc.
            </p>
            <p>
                Proin laoreet at ex at porta. Maecenas nibh odio, pretium non elit in, tempus interdum tortor. In a
                gravida odio. Vestibulum ante ipsum primis in
                faucibus orci luctus et ultrices posuere cubilia Curae; Cras elementum, lacus vestibulum tincidunt
                auctor, nisi ex hendrerit erat, sed maximus
                mauris ante a augue. Cras scelerisque, ligula et accumsan posuere, neque arcu sodales diam, quis
                sollicitudin arcu enim vitae elit.
                Mauris porta vestibulum volutpat. Praesent maximus diam vitae diam porta iaculis id ut tellus. Sed
                ornare egestas eros eget pellentesque.
                Curabitur varius lobortis sem, vitae pellentesque justo tincidunt vel. Fusce diam lectus, tristique id
                ex molestie, vehicula iaculis mi.
                Ut consectetur laoreet tincidunt.
            </p>
        </div>

        <h3 class='strikearound'>Moje gry</h3>
        @foreach(auth()->user()->games()->where('front_user_games_item.expired', 0)->get() as $game)
            {{$game->game->name}}<br/>
            Dostępna do: {{$game->pivot->expired_at}}<br/>
            <hr>
        @endforeach
    </div>
@endsection
