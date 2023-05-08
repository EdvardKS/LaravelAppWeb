<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>@yield('title', config('app.name'))</title>
        <meta
            name="description"
            content="@yield('description', 'Descripción por defecto')"
        />

        <!-- Fonts -->
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <!-- Google tag (gtag.js) -->
        <script
            async
            src="https://www.googletagmanager.com/gtag/js?id=G-DJEK07JMK4"
        ></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());

            gtag("config", "G-DJEK07JMK4");
        </script>
    </head>
    <body>
        <div id="app">
            @include('layouts.partials.navbar')

            <main class="py-4">@yield('content')</main>

            @include('layouts.partials.footbar')
        </div>
    </body>
</html>
