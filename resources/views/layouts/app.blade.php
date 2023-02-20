<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @vite('resources/css/app.css')
    @vite('resources/scss/app.scss')
</head>
    <body>
        <div id="app">
            @yield('content')
        </div>

        @vite('resources/js/app.js')
    </body>
</html>