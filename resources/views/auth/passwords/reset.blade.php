@extends('layouts.app')

@section('content')
<header class="team">
    <h1>{{ __('Reset Password') }}</h1>
</header>
<div class="login">
    <div class="loginBox">
        <form class="userLogin" method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="row-input">
                <label for="email">{{ __('Email Address') }}</label>

                <div class="col-input">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                        name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row-input">
                <label for="password">{{ __('Password') }}</label>

                <div class="col-input">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                        name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row-input">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                <div class="col-input">
                    <input id="password-confirm" type="password" class="form-control" 
                        name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-input offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
