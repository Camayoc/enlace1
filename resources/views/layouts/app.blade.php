<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <style>
        /* * {
            border: solid red 2px
        } */
        .navbar-toggler {
            display: block;
        }
        .navbar-brand {
            display: block;
        }
        .container-header {
            display: flex;
            justify-content: space-between;
            padding: .5rem
        }
        .container-profile {
            max-width: 600px;
            width: 100%;
            margin: auto
        }
        .profile {
            border-radius: 50%
        }

        .danmer-nav-container {
            height: 200px;
            display: inline-flex;
            align-items: flex-start;
        }

        .danmer-hidden-header {
            position: absolute;
            left: 10px;
            bottom: -60%;
        }
        .btn-follow {
            position: absolute;
            right: 4%;
            bottom: -50%;
        }

        .profile > img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            border: 2px solid #fff
            /* transform: translate(0px,-50%) */
        }

        .danmer-container {
            height: 20vh;
            position: relative;
        }

        .container.danmer-container {
            align-items: start !important;
        }

        .p-20 {
            padding-top: 200px !important;
        }

        .danmer-py-4 {
            padding-top: 3.7rem !important;
            padding-bottom: 1.5rem !important;
        }

        .danmer-toggle,
        .danmer-collapse {
            max-width: 5vw max-height: 5vh
        }
    </style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <header class="navbar navbar-expand-md bg-black navbar-light shadow-sm danmer-nav-contaifner">
            <nav class="container-profile  danmer-container">
                <div class="container-header">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler danmer-toggle" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse danmer-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                <div class="danmer-hidden-header">
                    <div class="profile">
                        <img src="https://i.picsum.photos/id/533/200/300.jpg?hmac=eehg5zb3wyJViBC8IiDL85fqqk9z85uHtRciYvDovgA"
                            alt="">
                    </div>
                </div>
                <div class="btn-follow">
                    <button>boton</button>
                </div>
            </nav>

        </header>

        <main class="danmer-py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
