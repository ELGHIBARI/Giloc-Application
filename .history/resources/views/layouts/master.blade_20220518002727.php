<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GILOC</title>
    <link rel="icon" href="assets/images/items/1.jpg" type="image/x-icon" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/ui.css" rel="stylesheet">
    <link href="/assets/css/responsive.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/8ab724eb48.js" crossorigin="anonymous"></script>

    {{-- <link href="css/comments.css" rel="stylesheet"> --}}

    <link href="/assets/css/all.min.css" rel="stylesheet">
    <script src="/assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
</head>

<body>
    <header class="section-header">
        <nav class="navbar navbar-expand-md navbar-light navcolor shadow-sm" style="background-color: #2c2b02; background-image: linear-gradient(120deg, #ffb700, #fad4d4); ">
            <a class="navbar-brand" href="{{ url('/') }}">
                GILOC
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <div class="container">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    </ul>
                </div>
                <div>
                    <ul class="navbar-nav d-none d-md-flex mr-5 mb-2">
                        <li class="nav-item dropdown"><a href="#" class="nav-link">
                                <div class="widget-header icontext ">
                                    <a href="#" class="icon icon-xs rounded-circle border"><i class="fa fa-user"></i></a>
                                    <div class="text">
                                        <span>
                                            @if (Auth::user())
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->nom_complet }}</a>
                                            <div class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                            @else
                                            <a href="">Sign in</a> |
                                            <a href=""> Register</a>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                        </li>
                    </ul> <!-- list-inline //  -->
                </div>
            </div>
            <!-- container //  -->
        </nav> <!-- header-top-light.// -->
    </header>
    <section class="header-main border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-6">
                    <a href="#" class="brand-wrap">
                        GILOC
                    </a> <!-- brand-wrap.// -->
                </div>
                <div class="col-lg-6 col-12 col-sm-12">
                    <form action="#" class="search" method="GET">
                        <div class="input-group w-100">
                            <input type="text" class="form-control" placeholder="Search" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-warning" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form> <!-- search-wrap .end// -->
                </div> <!-- col.// -->
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="widgets-wrap float-md-right">
                        <div class="widget-header  mr-3">
                            <a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></a>
                            <span class="badge badge-pill badge-danger notify">0</span>
                        </div>
                        <div class="widget-header  mr-3">
                            <a href="" class="icon icon-sm rounded-circle border"><i class="fa fa-envelope"></i></a>
                            <span class="badge badge-pill badge-danger notify">0</span>
                        </div>
                    </div> <!-- widgets-wrap.// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section> <!-- header-main .// -->

    <nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link pl-0" href="#"><strong> <i class="fa fa-bars"></i> Tous </strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Voiture</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Motos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Vélos</a>
                    </li>
                </ul>

            </div> <!-- collapse .// -->
        </div> <!-- container .// -->
    </nav>
    </header> <!-- section-header.// -->
    <main class="py-4">
        @yield('content')
    </main>
    </div>
</body>

</html>