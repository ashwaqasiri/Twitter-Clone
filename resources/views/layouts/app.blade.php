<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div id="app">
            <section class="px-8 py-4 mb-6">
                <header class="container mx-auto">
                    <h1>
                        <a href="/">
                            <x-application-logo class="h-10 text-gray-600" />
                        </a>
                    </h1>
                </header>
            </section>
    
            {{ $slot }}
        </div>
    
        <script src="http://unpkg.com/turbolinks"></script>
    </body>
</html>
