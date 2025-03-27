<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Udderly') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .navbar {
            background-color: #f5f5f5; /* Light gray background */
            border-bottom: 1px solid #ddd;
        }

        .navbar-brand {
            font-weight: bold;
            color: #333;
        }

        .nav-link {
            color: #333;
            margin-right: 10px;
        }

        .nav-link:hover {
            color: #007bff;
        }

        .dropdown-menu {
            border: 1px solid #ddd;
        }

        .dropdown-item {
            color: #333;
        }

        .dropdown-item:hover {
            background-color: #f0f8ff;
        }

        .py-4 {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .navbar-collapse {
            display: flex; /* Add flexbox to navbar-collapse */
            justify-content: space-between; /* Distribute space between left and right elements */
        }

        .navbar-nav.ms-auto {
            margin-left: auto; /* Align to the right */
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">Udderly</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        @auth
                            <a href="{{ route('posts.index') }}" class="nav-link">Moos</a>
                            <a href="{{ route('users.index') }}" class="nav-link">Cows</a>
                            <a href="{{ route('posts.following') }}" class="nav-link">Following</a>
                            <a href="{{ route('profiles.show', Auth::user()) }}" class="nav-link">My Pasture</a>
                        @endauth
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
