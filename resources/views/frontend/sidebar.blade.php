<!--LOGO-->
<div class="hamburger-menu hamburger-menu-two" xmlns="http://www.w3.org/1999/html">
    <input type="checkbox" class="input-check2" id="input-check2" hidden/>
    <label class="bars-container bars-container2" for="input-check2">
        <span class="bar bar1"></span>
        <span class="bar bar2"></span>
        <span class="bar bar3"></span>
    </label>
</div>
<div class="logo">
    <a href="{{url('/')}}">
        <img src={{ asset('img/logogf.png') }} alt="gamefly.pl">
    </a>
</div>
<!--szukajka-->
<div class="sidebar-search">
    <form class="search" action="{{route('Front::search')}}">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Szukaj gry" name="s">
            <span class="input-group-btn">
                 <button type="submit"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
</div>
<div id="sidebar-menu">
    <!-- nawigacja -->
    @include('frontend.menu')
</div>
<!-- sekcja logowania -->
<li class="zaloguj">
    @auth
        <a href="https://gamefly.pl/profil" class="btn" id="nl" style="margin-bottom:10px;">Profil</a>
        <a href="{{ route('Front::logout') }}" class="btn" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Wyloguj</a>
        <form id="logout-form" action="{{ route('Front::logout') }}" method="POST"
              style="display: none;">
            @csrf
        </form>
    @else
        <a href="{{ route('Front::login') }}" class="btn">Zaloguj</a>
    @endauth
</li>
