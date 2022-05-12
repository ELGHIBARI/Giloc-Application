<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Giloc</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0;
        }

        .navcolor {
            background-color: #2c2b02;
            background-image: linear-gradient(120deg, #ffb700, #fad4d4);
        }
        .headcrd {
            background-color: #2c2b02;
            background-image: linear-gradient(120deg, #ffb700, #fad4d4);
        }
        .fottcard {
            background-color: #2c2b02;
            background-image: linear-gradient(120deg, #fad4d4, #ffb700);
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .btn-red {
            color: #bc3906;
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
    </style>
</head>

<body class="antialiased bg-light">
    <nav class="navbar navbar-expand-lg bg-light navcolor">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logo (2).png') }}" alt="giloc">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @if (Route::has('login'))
                @auth
                <li class="nav-item mt-2">
                    <a href="{{ url('/home') }}" class="btn-orange">Home</a>
                </li>
                @else
                <li class="nav-item ml-3 mt-0">
                    <a href="{{ route('login') }}" class="btn btn-primary">Se connecter</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item mt-0">
                    <a href="{{ route('register') }}" class="btn btn-primary">S'inscrire</a>
                </li>
                @endif
                @endauth
            </ul>
            @endif
        </div>
    </nav>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-2"> <img src="{{ asset('img/pat1.png') }}" alt="giloc" ></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body card">
                        <h1 class=" mt-2 text-center" style="color : #bc3906; text-shadow: 0 0 5px #fad4d4 "><img src="{{ asset('img/logo (3).png') }}" alt="giloc" ></h1>
                        <div class="container text-center ">
                            <img src="{{ asset('img/pat1.png') }}" alt="giloc" >
                            <h3 class="mb-5" style="color : #697009; text-shadow: 0 0 2px #697009 "> les choix que vous faites
                            </h3>
                            <h6>
                                Qui sommes-nous ? Giloc est une application de location de véhicules qui vous de permet de louer des véhicules ou mettre en location vos véhicules
                            </h6>
                            <h5>
                                Comment ?
                            </h5>
                            <h6>
                                Selon vos besoins vous pouvez créer soit un compte client ou un compte partenaire
                            </h6>
                            <h6> le compte client : vous permet de consulter les annonces postées par les partenaire est réserver les véhicule qui vous intéresse
                                GILOC assure la communication avec le partenaire pour terminer la procédure.<br /><br/>
                                le compte partenaire : dès que vous postez vous annonces vous receverez les demandes des clients interessé
                                Pour améliorer des ses services et satisfaire ses utilisateurs GILOC permet l'évalution des objets ainsi que les transactions avec les utilisateurs.
                            </h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<footer class="py-2 bg-light footer fixed-bottom ">
    <div class="row">
        <div class="col-md-4 my-auto">
            <center>
                <img src="{{asset('img/output-onlinepngtools.png')}}" width="30" height="30" />
                GIloc@location.com
            </center>
        </div>
        <div class="col-md-4">
            <p class="m-0 text-center text-secondary">© 2021/2022 Copyright:</p>
            <center>GILOC</center>
            <p class="m-0 text-center text-secondary"> Avenue de la Palestine Mhanech I، Tétouan</p>
        </div>
        <div class="col-md-4 my-auto">
            <center>
                <img src="{{asset('img/tele.jpg')}}" width="30" height="30" />
                +212 512345678
            </center>
        </div>
</footer>

</html>