<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Contacts</title>
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
    </head>
    <body>
        @include('navigation')
        <div class="container-fluid mt-3">
            @include('errors');
            @include('sessions');
            @yield('content')
        </div>
        @include('footer')
        <!-- Scripts -->
        <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
