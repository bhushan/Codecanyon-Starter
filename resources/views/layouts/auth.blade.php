<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts._head')
</head>

<body class="login-page" style="border-top: 5px solid #1a0dab;">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('welcome') }}">
                <img src="{{ asset('logo.png') }}" alt="{{ config('app.name', 'Laravel') }}" height="150">
            </a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                @yield('content')
            </div>
        </div>
    </div>

</body>

</html>