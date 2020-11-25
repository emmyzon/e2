<!doctype html>
<html lang='en'>

<head>

    <title>@yield('title', $app->config('app.name'))</title>

    <meta charset='utf-8'>

    <link rel='shortcut icon' href='/favicon.ico'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href='/css/zipfoods.css' rel='stylesheet'>

    @yield('head')

</head>

<body>

    <header>
        <img id='logo' src='/images/zipfoods-logo.png' alt='{{ $app->config(' app.name') }} Logo'>

    </header>

    <main>
        @yield('content')
    </main>

    @yield('body')

</body>

</html>