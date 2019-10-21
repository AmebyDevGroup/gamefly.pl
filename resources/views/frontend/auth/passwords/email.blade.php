@extends('layouts.master')

@section('content')
    <h3 class='strikearound'>Przypomij hasło</h3>
    <div class="auth-box">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('Front::password.email') }}">
                    @csrf

                    <div class="form-group row">
                        <input id="email" type="email" placeholder="Wpisz adres e-mail"
                               class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group row mb-0">
                        <button type="submit" class="auth-button">
                            {{ __('Wyślij link do zresetowania hasła') }}
                        </button>
                        <a class="forgot" href="{{ URL::previous() }}">Cofnij</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
