@php
    use App\GamesCategory;$categories = GamesCategory::all();
@endphp

<div class="menu">
    <li class="item" id="messages">
        <a href="#" class="btn"></i>Odkrywaj</a>
    </li>

    <li class="item" id="settings">
        <a href="#settings" class="btn"></i>Kategorie</a>
        <div class="smenu">
            @foreach($categories as $category)
                <a href="{{route('Front::category', [$category->slug])}}">{{$category->name}}</a>
            @endforeach
        </div>
    </li>
</div>
