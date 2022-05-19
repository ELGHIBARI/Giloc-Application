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
    <!--- test -->

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">

    <!--<script src="js/adminlte.min.js"></script>-->
    <script src="DataTables/jquery.dataTables.min.js"></script>
    <script src="DataTables/dataTables.bootstrap4.min.js"></script>
    <script src="DataTables/buttons.bootstrap4.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" />
    <!--<link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/DataTables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/DataTables/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/DataTables/buttons.bootstrap4.min.css') }}">

    <style>
        .text-red {
            color: #bc3906;
        }

        .card-header {
            border: 0px solid;
            background-color: white;

        }

        .navcolor {
            background-color: #2c2b02;
            background-image: linear-gradient(120deg, #ffb700, #fad4d4);
        }

        .gradInverse {
            background-color: #2c2b02;
            background-image: linear-gradient(120deg, #fad4d4, #ffb700);
        }

        .card {
            border: 0.5px solid #fad4d4;
        }


        .btn-primary {
            background-color: #FFF;
            color: #bc3906;
            border-color: #bc3906;
            border-radius: 25px;
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active {
            background-color: #bc3906;
            color: #FFF;
            border-color: #bc3906;
        }

        .btn-trans {
            background-color: Transparent;
            color: #bc3906;
            border-color: Transparent;
            border-radius: 15px;
        }

        .btn-trans:hover,
        .btn-trans:focus,
        .btn-trans:active {
            background-color: Transparent;
            color: #bc3906;
            border-color: #bc3906;
        }

        .btn-warning {
            background-color: #FFF;
            color: #697009;
            border-color: #697009;
            border-radius: 25px;
        }

        .btn-warning:hover,
        .btn-warning:focus,
        .btn-warning:active {
            background-color: #697009;
            color: #FFF;
            border-color: #697009;
        }

        body {
            background-color: #f4f7f6;

        }

        .btn-send {
            background-color: #bc3906;
            color: #FFF;
            border-color: #bc3906;
        }

        .btn-send:hover,
        .btn-send:focus,
        .btn-send:active {
            background-color: #bc3906;
            color: #FFF;
            border-color: #fad4d4;
        }
    </style>
    @yield('head')

</head>

<body>
    <div>
        <nav class="navbar navbar-expand-md navbar-light navcolor shadow-sm">
            <a class="navbar-brand" href="{{ url('/') }}">
                GILOC
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    @auth
                    @if(Auth::user()->role=="partenaire")
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">{{Auth::user()->unreadNotifications->count()}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">{{Auth::user()->unreadNotifications->count()}} Notifications</span>
                            @foreach(Auth::user()->unreadNotifications as $notification)
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                            <i class="fad fa-clipboard-list"></i>
                                <span class="float-right text-muted text-sm"> @php $date_envoi_dem = strtotime($notification->data['date_demande']);
                                     $difference = time()-$date_envoi_dem; @endphp
                                    @if($difference<=86400)@php $hours=abs(round($difference / 3600)); $minutes=$difference-$hours; $minutes=abs(floor($minutes))/60; @endphp {{$hours}} heures{{ $minutes}} minutes @else {{ abs(round($difference / 86400)) }} jours @endif <br/> Demande pour l'annonce : {{$notification->data['titre_annonce']}}<br> Client interssé : {{$notification->data['client']}}  </a>
                                </span>
                            </a>
                            @endforeach
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li>
                    <li>
                        @php $id=Auth::user()->id
                        @endphp
                        <a class="nav-link" href="{{url('/annonces/'.$id.'')}}">Annonces</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('/demande/index') }}">Demandes</a>
                    </li>
                    @endif
                    @endauth
                </ul>

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
                    @auth
                    @if(Auth::user()->role=="partenaire")
                    <li class="nav-item">
                        <a class="btn btn-trans" href="{{ url('/annonce/create') }}">
                            <i class="fa-solid fa-plus"></i>&nbspannonce
                        </a>
                    </li>
                    @endif
                    @endauth
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
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>