<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ ($settings->where('key', 'sitename')->pluck('value')->first() ?? 'Enlight Technologies') }}</title>

<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="48x48" href="{{ asset('favicon-48x48.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">

<link rel="canonical" href="{{ asset( request()->path() ) }}">

<link rel="dns-prefetch" href="//fonts.gstatic.com">

<link href="//fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">

<link href="{{ asset('css/app.css') }}" rel="stylesheet">