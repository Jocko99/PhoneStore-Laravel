    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">
    <meta name="keywords" @yield('keywords')>
    <meta name="description" content="@yield('description')">
    <meta name="author" content="Nikola Jocković">
    <title>Telefon - @yield('title')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/bootstrap.min.css")}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/main.css")}}"/>
    @yield('links')

