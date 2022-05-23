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
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/ui.css" rel="stylesheet">
  <link href="assets/css/responsive.css" rel="stylesheet">

  <link href="assets/css/all.min.css" rel="stylesheet">
  <script src="assets/js/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
  <style>
    /*.btn-send {
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

    .fa-shopping-cart {
      color: #000 !important;
    }


    .fa-envelope {
      color: #000 !important;
    }



    .badge-danger {
      background-color: #bc3906 !important;

    }*/
  </style>
</head>

<body>

  <header class="section-header">
    <nav class="navbar navbar-expand-md navbar-light navcolor shadow-sm py-0" style="background-color: #2c2b02; background-image: linear-gradient(120deg, #ffb700, #fad4d4); ">
      <div class="container">
        <ul class="navbar-nav d-none d-md-flex mr-auto">
          <li class="nav-item"><a class="nav-link" href="@if (!Auth::user()) {{ route('login') }}@else {{ route('home') }}  @endif"><img src="{{url('img/logo-80.png')}}" /></a></li>
          <li class="nav-item"><a class="nav-link" href="@if (!Auth::user()) {{ route('login') }}@else {{ route('home') }}  @endif">Acceuil</a></li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item"><a href="#" class="nav-link"> Télé: +051235497 </a></li>
        </ul> <!-- list-inline //  -->

      </div> <!-- container //  -->
    </nav> <!-- header-top-light.// -->

    <section class="header-main border-bottom">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-6 col-12">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-sm-10 col-12">
          </div> <!-- search-wrap .end// -->
          <div class="col-lg-4 col-sm-10 col-12">
          </div>
          <div class="col-lg-4 col-sm-10 col-12">
            <div class="widgets-wrap float-md-right">
              <div class="widget-header  mr-3">
                <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                    <a href="" class="icon icon-sm rounded-circle border" data-toggle="dropdown" href="#"><i class="fa fa-shopping-cart"></i>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="widget-header  mr-3">
                <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                    <a href="" class="icon icon-sm rounded-circle border" data-toggle="dropdown" href="#"><i class="fa fa-envelope"></i>
                    </a>

                  </li>
                </ul>
              </div>
              <div class="widget-header icontext">
                <div>
                  @if (Auth::user())
                  <a href="{{ route('login') }}"> {{ Auth::user()->nom_complet }}</a>
                  @else
                  <a href="{{ route('login') }}">Se connecter</a> |
                  <a href="{{ route('register') }}"> S'inscrire</a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> <!-- header-main .// -->

    <nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="main_nav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link pl-0" href="{{ url('/acceuil') }}"><strong> <i class="fa fa-bars"></i> Tous </strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('annonces.voiture') }}">Voiture</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('annonces.moto') }}">Motos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('annonces.velo') }}">Vélos</a>
            </li>
          </ul>

        </div> <!-- collapse .// -->
      </div> <!-- container .// -->
    </nav>
  </header> <!-- section-header.// -->

  @include('incs.banner')

  @include('incs.feature')


  <!-- ========================= SECTION CONTENT ========================= -->
  <section class="section-content">
    <div class="container">
      @if (!is_null($annonces_voiture))
      <header class="section-heading">
        <h3 class="section-title">Nos Automobiles </h3>
      </header><!-- sect-heading -->
      <div class="row">
        @foreach($annonces_voiture as $annonce)
        <div class="col-md-3">
          <div href="#" class="card card-product-grid">
            @php
            $img = $annonce['images_voiture'] ;
            @endphp
            <a href="#" class="img-wrap"> <img src="{{asset('/images/partenaireUploads/Voitures/'.$img.'')}}"> </a>
            <figcaption class="info-wrap">
              <div class="md-12">
                <a href="@if (!Auth::user()) {{ route('login')}}
                @else {{ route('annonces.show', $annonce['id']) }} @endif" class="title md-9">{{ $annonce['titre'] }}</a><span class="md-3">
                  <h6>{{ $annonce['ville'] }}</h6>
                </span>
              </div>
              <div class="rating-wrap">
                <ul class="rating-stars">
                  <li style="width:80%" class="stars-active">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                  </li>
                  <li>
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                  </li>
                </ul>
                <span class="label-rating text-muted"> 34 reviws</span>
              </div>
              <div class="price mt-1 ml-1">
                {{ $annonce['prix_par_jour'] }} MAD
                <a href="@if (Auth::user() and Auth::user()->role='client'){route('annonces.show', $annonce['id']) }
            @else  {{ route('login')}}  @endif" class="btn btn-warning ml-5"><i class="fa fa-shopping-cart"></i></a>
                <a href="@if (Auth::user() and Auth::user()->role='client'){route('annonces.show', $annonce['id']) }
            @else  {{ route('login')}}  @endif" class="btn btn-warning ml-5"><i class="fa fa-shopping-cart"></i></a>
              </div> <!-- price-wrap.// -->
            </figcaption>
          </div>
        </div> <!-- col.// -->
        @endforeach
        @endif
      </div>
      <header class="section-heading">
        <h3 class="section-title">Nos Motos </h3>
      </header><!-- sect-heading -->
      <div class="row">
        @if (!is_null($annonces_moto))
        @foreach($annonces_moto as $annonce)
        <div class="col-md-3">
          <div href="#" class="card card-product-grid">
            @php
            $img = $annonce['images_moto'] ;
            @endphp
            <a href="#" class="img-wrap"> <img src="{{asset('/images/partenaireUploads/Motos/'.$img.'')}}"> </a>
            <figcaption class="info-wrap">
              <div class="md-12">
                <a href="@if (!Auth::user()) {{ route('login')}} 
                @else {{ route('annonces.show', $annonce['id']) }} @endif" class="title md-9">{{ $annonce['titre'] }}</a><span class="md-3">
                  <h6>{{ $annonce['ville'] }}</h6>
                </span>
              </div>
              <div class="rating-wrap">
                <ul class="rating-stars">
                  <li style="width:80%" class="stars-active">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                  </li>
                  <li>
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                  </li>
                </ul>
                <span class="label-rating text-muted"> 34 reviws</span>
              </div>
              <div class="price mt-1 ml-1">
                {{ $annonce['prix_par_jour'] }} MAD
                <a href="@if (Auth::user() and Auth::user()->role='client'){route('annonces.show', $annonce['id']) }
            @else  {{ route('login')}}  @endif" class="btn btn-warning ml-5"><i class="fa fa-shopping-cart"></i></a>
                <a href="@if (Auth::user() and Auth::user()->role='client'){route('annonces.show', $annonce['id']) }
            @else  {{ route('login')}}  @endif" class="btn btn-warning ml-5"><i class="fa fa-shopping-cart"></i></a>
              </div> <!-- price-wrap.// -->
            </figcaption>
          </div>
        </div> <!-- col.// -->
        @endforeach
        @endif
      </div>
      @if (!is_null($annonces_velo))
      <header class="section-heading">
        <h3 class="section-title">Nos Velos </h3>
      </header><!-- sect-heading -->
      <div class="row">
        @foreach($annonces_velo as $annonce)
        <div class="col-md-3">
          <div href="#" class="card card-product-grid">
            @php
            $img = $annonce['images_velo'] ;
            @endphp
            <a href="#" class="img-wrap"> <img src="{{asset('/images/partenaireUploads/Vélos/'.$img.'')}}"> </a>
            <figcaption class="info-wrap">
              <div class="md-12">
                <a href="@if (!Auth::user()) {{ route('login')}} 
              @else {{ route('annonces.show', $annonce['id']) }} @endif" class="title md-9">{{ $annonce['titre'] }}</a><span class="md-3">
                  <h6>{{ $annonce['ville'] }}</h6>
                </span>
              </div>
              <div class="rating-wrap">
                <ul class="rating-stars">
                  <li style="width:80%" class="stars-active">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                  </li>
                  <li>
                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                  </li>
                </ul>
                <span class="label-rating text-muted"> 34 reviws</span>
              </div>
              <div class="price mt-1 ml-1">
                {{ $annonce['prix_par_jour'] }} MAD
                <a href="@if (Auth::user() and Auth::user()->role='client'){route('annonces.show', $annonce['id']) }
            @else  {{ route('login')}}  @endif" class="btn btn-warning ml-5"><i class="fa fa-shopping-cart"></i></a>
                <a href="@if (Auth::user() and Auth::user()->role='client'){route('annonces.show', $annonce['id']) }
            @else  {{ route('login')}}  @endif" class="btn btn-warning ml-5"><i class="fa fa-shopping-cart"></i></a>
              </div> <!-- price-wrap.// -->
            </figcaption>
          </div>
        </div> <!-- col.// -->
        @endforeach
        @endif
      </div>
    </div>
    @include('incs.NosPartenaires')
    @include('incs.footer')