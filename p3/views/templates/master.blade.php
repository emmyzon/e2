<!doctype html>
<html lang='en'>
<head>

    <title>@yield('title', $app->config('app.name'))</title>
    <meta charset='utf-8'>
    <link rel='shortcut icon' href='/favicon.ico'>
    <link href='/css/rps-styles-p3.css' type='text/css' rel='stylesheet'>
    <link href='/css/app.css' rel='stylesheet'>
    @yield('head')

</head>
<body>
    <header>
        <img id='rps' src='/images/rps.gif' alt='Rock Paper Scissors Gif'>
        <h1><a href='/'>{{ $app->config('app.name') }}</a></h1>
    </header>

    <main>
        @yield('content')
    </main>

    @yield('body')

</body>
</html>
