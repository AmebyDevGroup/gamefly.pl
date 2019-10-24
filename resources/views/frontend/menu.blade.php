@php
    use App\GamesCategory;
    $categories = GamesCategory::all();
    $cat = $currentCategory->id??false;
@endphp

<div class="menu">
    <li class="item" id="messages">
        <a href="{{url('/')}}" class="btn"></i>Odkrywaj</a>
    </li>

    <li class="item @if($cat) toggled @endif " id="settings">
        <a href="#settings" class="btn"></i>Kategorie</a>
        <div class="smenu">
            @foreach($categories as $category)
                <a @if($cat == $category->id) class="active"
                   @endif href="{{route('Front::category', [$category->slug])}}">{{$category->name}}</a>
            @endforeach
        </div>
    </li>
</div>
