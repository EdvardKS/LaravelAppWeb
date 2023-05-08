<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app" class="container-fluid">
        <div class="row">
            <div class="col-2 vh-100 py-4" style="background-color: #00104b;">
                @include('admin.layouts.partials.sidebar')
            </div>

            <div id="zonaPanel" class="col vh-100 bg-light ">

                @yield('content')
                @yield('scripts')

            </div>
        </div>
    </div>
</body>

</html>