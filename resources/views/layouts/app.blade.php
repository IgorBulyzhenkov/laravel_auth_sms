<!DOCTYPE html>
<html lang="uk">

    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <meta name="format-detection" content="telephone=no">
        <!-- <style>body{opacity: 0;}</style> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link
        <link rel="shortcut icon" href="favicon.ico">
        <!-- <meta name="robots" content="noindex, nofollow"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>

        <div class="wrapper">

            @extends('components.header')

            @yield('content')

            @extends('components.footer')

            @extends('components.alerts')

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>

    </body>

</html>
