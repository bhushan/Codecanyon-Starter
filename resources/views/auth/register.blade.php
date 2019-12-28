@extends('layouts.auth')

@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="input-group mb-3">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="input-group mb-3">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
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
            name="password" placeholder="Password" required autocomplete="new-password">
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
    <div class="input-group mb-3">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
            placeholder="Confirm Password" required autocomplete="new-password">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-12">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</form>

<div class="form-group row justify-content-center mt-3">
    <div class="col-12">
        {{ __('Already have an account?') }}
        <a title="Login" class="w-100 text-decoration-none" href="{{ route('login') }}">
            {{ __('Sign in') }}
        </a>
    </div>
</div>
@endsection