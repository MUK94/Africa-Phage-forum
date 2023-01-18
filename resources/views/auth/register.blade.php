@extends('layouts.app')

@section('content')
<header class="team">
    <h1>{{ __('Join the Community') }}</h1>
</header>
    <div class="register">
        <div class="registerBox">
            
            <form class="userRegister" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row-input">
                    <label for="name">{{ __('* Name') }}</label>

                    <div class="col-input">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                            name="name" value="{{ old('name') }}" minlength="5" pattern="^[a-zA-Z\s]+" maxlength="30" title="Enter min 5 letters only" 
                                required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row-input">
                    <label for="email">{{ __('* Email Address') }}</label>

                    <div class="col-input">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row-input">
                    <label for="experience">{{ __('* Experience') }}</label>

                    <div class="col-input">
                        <input id="experience" type="experience" class="form-control @error('experience') is-invalid @enderror" 
                            name="experience" value="{{ old('experience') }}" required autocomplete="experience" maxlength="100"
                            placeholder="Highlight your phage research experience (max 100 chars)" >

                        @error('experience')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row-input">
                    <label for="laboratory">{{ __('* Laboratory') }}</label>

                    <div class="col-input">
                        <input id="laboratory" type="laboratory" class="form-control @error('laboratory') is-invalid @enderror" 
                            name="laboratory" value="{{ old('laboratory') }}" required autocomplete="laboratory" maxlength="100"
                            placeholder="Enter your research department or laboratory (max 100 chars)" >

                        @error('experience')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row-input">
                    <label for="password">{{ __('* Password') }}</label>

                    <div class="col-input">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row-input">
                    <label for="password-confirm">{{ __('* Confirm Password') }}</label>

                    <div class="col-input">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                
                <div class="row mb-0">
                    <small>(By filling this form you agree to APF terms and conditions)</small>
                    <div class="col-input offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Join us') }}
                        </button>
                    </div>
                </div>
                <div class="outerLink">
                    <span>Have an Account ?</span>
                    <span class="innerLink"><a href="{{ route('login') }}">Login</a></span>
                </div>
            </form>

        </div>
    </div>
@endsection
