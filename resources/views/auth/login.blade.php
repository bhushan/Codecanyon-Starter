@extends('layouts.auth')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="input-group mb-3">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="input-group mb-3">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" placeholder="Password" required autocomplete="current-password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
            <a class="ml-2" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </div>
    </div>
</form>
@if (Route::has('register'))
<div class="form-group row justify-content-center mt-3">
    <div class="col-12">
        {{ __("Don't have an account?") }}
        <a title="Register" class="w-100 text-decoration-none" href="{{ route('register') }}">
            {{ __('Sign Up') }}
        </a>
    </div>
</div>
@endif
@endsection