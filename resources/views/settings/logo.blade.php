@extends('layouts.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3>
                        {{ __('Logo Settings') }}
                    </h3>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.post.logo-settings') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <img src="{{ asset('logo.png') }}" alt="sitelogo" title="logo">
                    <img src="{{ asset('apple-touch-icon.png') }}" alt="apple-touch-icon" title="apple-touch-icon"
                        class="mr-4"> <img src="{{ asset('favicon-48x48.png') }}" alt="favicon-48x48"
                        title="favicon-48x48" class="mr-4"> <img src="{{ asset('favicon-32x32.png') }}"
                        alt=" favicon-32x32" title="favicon-32x32" class="mr-4"> <img
                        src="{{ asset('favicon-16x16.png') }}" alt="favicon-16x16" title="favicon-16x16" class="mr-4">
                    <div class="input-group mt-4">
                        <div class="custom-file">
                            <input name="logo" type="file" accept="image/x-png" class="custom-file-input"> <label
                                for="logo" class="custom-file-label">
                                {{ __('Logo: (Best fit 250x250 transparent png)') }}
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary border mt-4">{{ __('Upload') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection