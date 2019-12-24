<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts._head')
</head>

<body>
    <div id="app" style="border-top: 5px solid #1a0dab;">

        @include('layouts._nav')

        <main class="my-5">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>