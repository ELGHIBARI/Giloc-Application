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

    .fa-shopping-cart:hover {
      color: red !important;;
    }
  </style>
</head>

<body>

  @include('incs.navbar')

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
                <a href="@if (!Auth::user()) {{ route('login')}} 
              @else {{ route('annonces.show', $annonce['id']) }} @endif" class="btn btn-warning ml-5"><i class="fa fa-shopping-cart"></i></a>
                <a href="@if (!Auth::user()) {{ route('login')}} 
              @else {{ route('annonces.show', $annonce['id']) }} @endif" class="btn btn-warning ml-1"><i class="fa fa-envelope"></i>
                </a>
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
                <a href="@if (!Auth::user()) {{ route('login')}} 
              @else {{ route('annonces.show', $annonce['id']) }} @endif" class="btn btn-warning ml-5"><i class="fa fa-shopping-cart"></i></a>
                <a href="@if (!Auth::user()) {{ route('login')}} 
              @else {{ route('annonces.show', $annonce['id']) }} @endif" class="btn btn-warning ml-1"><i class="fa fa-envelope"></i>
                </a>
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
                <a href="@if (!Auth::user()) {{ route('login')}} 
            @else {{ route('annonces.show', $annonce['id']) }} @endif" class="btn btn-warning ml-5"><i class="fa fa-shopping-cart"></i></a>
                <a href="@if (!Auth::user()) {{ route('login')}} 
            @else {{ route('annonces.show', $annonce['id']) }} @endif" class="btn btn-warning ml-1"><i class="fa fa-envelope"></i>
                </a>
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