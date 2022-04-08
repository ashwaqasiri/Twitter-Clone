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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
        integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <!-- navbar goes here -->
    <nav class="bg-gray-100 mb-8 py-2 sm:py-4">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">

                <div class="flex space-x-4">
                    <!-- logo -->
                    <div>
                        <a href="#" class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
                            <x-application-logo class="h-10 w-20 text-gray-600" />
                            <span class="font-bold">Tweety</span>
                        </a>
                    </div>

                    <!-- primary nav -->
                    <div class="hidden sm:flex md:flex-row items-center space-x-1">
                        <a href="{{ route('home') }}" class="py-5 px-8 text-gray-700 hover:text-gray-900">Home</a>
                        <a href="/explore" class="py-5 px-8 text-gray-700 hover:text-gray-900">Explore</a>
                        <a href="{{route('profile', auth()->user())}}" class="py-5 px-8 text-gray-700 hover:text-gray-900">
                          Profile
                      </a>
                    </div>
                </div>

                <!-- secondary nav -->
                @if (Route::has('login'))
                    <div class="hidden sm:flex items-center space-x-1">
                        @auth
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                          @csrf
                          <button type="submit" class="py-5 px-8">Logout</button>
                      </form>
                            {{-- <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="py-5 px-8">Logout</a> --}}
                        @else
                            <a href="{{ route('login') }}"
                                class="py-2 px-8 bg-yellow-400 hover:bg-yellow-300 text-yellow-900 hover:text-yellow-800 rounded transition duration-300">Login</a>
                        @endauth
                    </div>
                @endif
                <!-- mobile button goes here -->
                <div class="sm:hidden flex items-center">
                    <button class="mobile-menu-button">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- mobile menu -->
        <div class="mobile-menu hidden md:hidden">
            <a href="{{ route('home') }}" class="block py-2 px-4 text-sm hover:bg-gray-200">Home</a>
            <a href="/explore" class="block py-2 px-4 text-sm hover:bg-gray-200">Explore</a>
            <a href="{{route('profile', auth()->user())}}" class="block py-2 px-4 text-sm hover:bg-gray-200">
                Profile
            </a>
            {{-- @auth
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="py-5 px-8">Logout</button>
              </form>
           @endauth --}}
        </div>
    </nav>
    <div id="app">
        {{ $slot }}
    </div>
    <script src="http://unpkg.com/turbolinks"></script>
    @livewireScripts
    <script>
        // grab everything we need
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");

        // add event listeners
        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>
</body>

</html>
