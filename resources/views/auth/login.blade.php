@extends('layouts.app')

@section('content')
<header class="team">
    <h1>{{ __('Login') }}</h1>
</header>
    <div class="login">
        <div class="loginBox">
            <form class="userLogin" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row-input">
                    <label for="email" >{{ __('* Email Address') }}</label>

                    <div class="col-input">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row-input">
                    <label for="password" >{{ __('* Password') }}</label>

                    <div class="col-input">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                            name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row-input-remember">
                    <div class="col-input remember">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row-input-btn">
                    <div class="col-btn">
                        <button type="submit">
                            {{ __('Login') }}
                        </button>

                        {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
