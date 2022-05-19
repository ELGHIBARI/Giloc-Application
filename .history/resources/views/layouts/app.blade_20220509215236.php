<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Giloc') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Giloc') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                        @if(Auth::user()->role=="partenaire")
                        <li>
                        <a class="navbar-brand" href="{{ url('/annonce/create') }}">
                           <!-- <div class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                                <ul style="list-style : none;" >
                                    <li>
                                        <a class="dropdown-item text-right"onclick="event.preventDefault();
                                                     document.getElementById('add-annonce-form').submit();">
                                            Ajouter une annonce
                                        </a>

                                        <form id="add-annonce-form" action="{{ url('/annonce/create')  }}" method="GET" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-right" href="{{ url('/annonce/create') }}" onclick="event.preventDefault();
                                                     document.getElementById('add-annonce-form').submit();">
                                            Ajouter une annonce
                                        </a>

                                        <form id="add-annonce-form" action="{{ url('/annonce/create')  }}" method="GET" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div> -->

                            @endif

                            @endauth</ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('se connecter') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('s\'inscrire') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->nom_complet }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-right" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</body>

</html>