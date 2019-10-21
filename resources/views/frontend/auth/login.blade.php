@extends('layouts.master')

@section('content')
    <h3 class='strikearound'>Logowanie</h3>
    <div class="auth-box">
        <div class="card">
            <img id="ll" src={{ asset('img/logo.png') }} alt="GameFly">
            <div class="card-body">
                <form method="POST" action="{{ route('Front::login') }}">
                    @csrf
                    <div class="form-group row">
                        <input id="email" type="email" placeholder="Adres E-Mail"
                               class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <input id="password" type="password" placeholder="Hasło"
                               class="form-control @error('password') is-invalid @enderror" name="password"
                               required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Zapamiętaj mnie') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <button type="submit" class="auth-button">
                            {{ __('Zaloguj') }}
                        </button>
                        </br>
                        @if (Route::has('Front::password.request'))
                            <a class="forgot" href="{{ route('Front::password.request') }}">
                                {{ __('Przypomnij hasło') }}
                            </a>
                        @endif
                        @if (Route::has('Front::register'))
                            <a class="register" href="{{ route('Front::register') }}">
                                {{ __('Utwórz konto') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
