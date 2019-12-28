<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts._head')
</head>

<body class="login-page" style="border-top: 5px solid #1a0dab;">
    <div class="login-box">
        <div class="login-logo">
            <img src="{{ asset('logo.png') }}" alt="{{ config('app.name', 'Laravel') }}" height="150">
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>