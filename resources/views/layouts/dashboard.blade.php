<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts._head')
</head>

<body>

    <div id="app" class="wrapper">

        @include('layouts.dashboard._nav')

        @include('layouts.dashboard._sidebar')

        <div class="content-wrapper">

            <div class="content">
                <div class="container-fluid pt-3">
                    @yield('content')
                </div>
            </div>
        </div>

        @include('layouts.dashboard._footer')

    </div>


    <script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>