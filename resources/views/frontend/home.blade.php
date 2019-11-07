@extends('layouts.master')

@section('content')
    <div class="home">
        <div class="service">
            <div id="carousel-example-generic" class="carousel slide carousel-fade">
                <div class="carousel-inner">
                    <div class="item active">
                    </div>
                    <!-- TOP -->
                    <div class="service">
                        <h3 class='strikearound'>TOP</h3>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <!-- Service item -->
                                <div class="service-item animated">
                                    <i class="icon-camera skyblue"></i>
                                    <!-- Service item heading -->
                                    <h4><a href="#">Neque perspiciatis</a></h4>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia mollit
                                        anim id ests.</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <div class="service-item animated">
                                    <i class="icon-envelope nblue"></i>
                                    <h4><a href="#">Finibus perspiciatis</a></h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium totam
                                        remo.</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <div class="service-item animated">
                                    <i class="icon-download blue"></i>
                                    <h4><a href="#">Cicero perspiciatis</a></h4>
                                    <p>Nor again is there anyone who loves or pursues or desires to obtain pain of
                                        itself pain.</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <div class="service-item animated">
                                    <i class="icon-gamepad green"></i>
                                    <h4><a href="#">Malorum perspiciatis</a></h4>
                                    <p>At vero eos et accusamus et iusto odio dignissimos qui blanditiis praesentium
                                        itate none.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class='strikearound'>NEWS</h3>
            <div class="row">
                @php
                    use App\Game;$news = Game::where('active',1)->orderBy('created_at')->limit(4)->get();
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
                    use App\TagsCount;$tags = TagsCount::all();
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
            "count": "{{$tag->weight}}"
        },
        @endforeach
    ]
</script>

