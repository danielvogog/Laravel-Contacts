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
        @include('include.navigation')
        <div class="container-fluid mt-3">
            @include('session.errors')
            @include('session.status')
            @yield('content')
        </div>
        @include('include.footer')
        <!-- SweetAlert2 -->
        @include('sweetalert::alert')
        <!-- Scripts -->
        <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
