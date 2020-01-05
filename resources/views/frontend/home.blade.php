@extends('layouts.master')

@section('content')
    <div class="home">
        <div class="service">
            <h3 class='strikearound'>TOP</h3>
            <div class="row">
                @php
                    $news = App\Game::with('media','category')->where('active',1)
                            ->join('rate_avgs', 'games.id', '=', 'rate_avgs.game_id')
                            ->orderBy('rate_avgs.rate', 'DESC')
                            ->select('games.*')
                            ->limit(4)->get();
                @endphp
                @foreach($news as $game)
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <!-- Service item -->
                        <div class="service-item animated">
                            @if($game->getFirstMedia('poster'))
                                <img src="{{$game->getFirstMedia('poster')->getUrl('thumb')}}">
                            @else
                                <img src="https://via.placeholder.com/150x200">
                        @endif
                        <!-- Service item heading -->
                            <div>
                                <h4><a href="{{$game->getUrl()}}">{{$game->name}}</a></h4>
                                <p>
                                    @if($game->introtext)
                                        {{$game->introtext}}
                                    @else
                                        @if(strlen(strip_tags($game->fulltext))>150)
                                            {{substr(strip_tags($game->fulltext),0,150)}}...
                                        @else
                                            {{$game->fulltext}}
                                        @endif
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <h3 class='strikearound'>NEWS</h3>
            <div class="row">
                @php
                    $news = App\Game::with('media','category')->where('active',1)->orderBy('created_at', 'DESC')->limit(4)->get();
                @endphp
                @foreach($news as $game)
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <!-- Service item -->
                        <div class="service-item animated">
                            @if($game->getFirstMedia('poster'))
                                <img src="{{$game->getFirstMedia('poster')->getUrl('thumb')}}">
                            @else
                                <img src="https://via.placeholder.com/150x200">
                        @endif
                        <!-- Service item heading -->
                            <div>
                                <h4><a href="{{$game->getUrl()}}">{{$game->name}}</a></h4>
                                <p>
                                    @if($game->introtext)
                                        {{$game->introtext}}
                                    @else
                                        @if(strlen(strip_tags($game->fulltext))>150)
                                            {{substr(strip_tags($game->fulltext),0,150)}}...
                                        @else
                                            {{$game->fulltext}}
                                        @endif
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <h3 class='strikearound'>TAGS</h3>
            <div id="chartdiv">
                @php
                    $tags = App\TagsCount::all();
                @endphp
            </div>
        </div>
    </div>
@endsection
<script>
    var data = [
            @foreach($tags  as $tag)
        {
            "tag": "{{$tag->name}}",
            "slug": "{{\Illuminate\Support\Str::slug($tag->name)}}",
            "count": "{{$tag->weight}}"
        },
        @endforeach
    ]
</script>

