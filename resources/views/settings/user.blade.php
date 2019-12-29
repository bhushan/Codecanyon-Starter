@extends('layouts.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    User Settings
                </h3>
            </div>

            <div class="card-body">
                <form action="{{ route('patch.user-settings')}}" method="post" class="mt-3">
                    @csrf
                    @method('patch')
                    <div class="input-group mt-3">
                        <input required class="form-control" type="text" name="name" placeholder="Name"
                            aria-label="Name" aria-describedby="name" value="{{ auth()->user()->name }}">
                        <div class="input-group-append">
                            <span class="input-group-text" id="name">
                                <i class="fas fa-user primary"></i>
                            </span>
                        </div>
                    </div>
                    @error('name')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                    @enderror
                    <div class="input-group mt-3">
                        <input required class="form-control" type="email" name="email" placeholder="Email"
                            aria-label="Email" aria-describedby="email" value="{{ auth()->user()->email }}">
                        <div class="input-group-append">
                            <span class="input-group-text" id="email">
                                <i class="fas fa-envelope primary"></i>
                            </span>
                        </div>
                    </div>
                    @error('email')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                    <br>
                    @enderror
                    <button class="btn btn-primary mt-3" title="Update Profile" type="submit">
                        {{ __('Update') }}
                    </button>
                </form>

                <form action="{{ route('patch.user-password') }}" method="post" class="mt-3">
                    @csrf
                    @method('patch')
                    <div class="input-group mt-3">
                        <input required class="form-control" type="password" name="current_password"
                            placeholder="Current Password" aria-label="current_password"
                            aria-describedby="current_password">
                    </div>
                    @error('current_password')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                    @enderror
                    <div class="input-group mt-3">
                        <input required class="form-control" type="password" name="password" placeholder="New Password"
                            aria-label="password" aria-describedby="password">
                    </div>
                    @error('password')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                    @enderror
                    <div class="input-group mt-3">
                        <input required class="form-control" type="password" name="password_confirmation"
                            placeholder="Confirm New Password" aria-label="password_confirmation"
                            aria-describedby="password_confirmation">
                    </div>
                    @error('password_confirmation')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                    <br>
                    @enderror
                    <button class="btn btn-primary mt-3" title="Update Password" type="submit">
                        {{ __('Update') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection