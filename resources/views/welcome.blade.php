@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center">

            <h1 class="display-4">
                <img src="{{ asset('logo.png') }}"
                    alt="{{ ($settings->where('key', 'sitename')->pluck('value')->first() ?? 'Enlight Technologies') }}"
                    height="250">
            </h1>
            <p class="lead">Creative Ideas, Innovative Solutions</p>
            <hr class="my-4">
            <p>Content</p>

        </div>
    </div>
</div>
@endsection