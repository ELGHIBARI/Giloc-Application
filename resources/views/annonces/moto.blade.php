<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GILOC</title>
        <link rel="icon" href="assets/images/items/1.jpg" type="image/x-icon"/>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
       <!-- Custom styles for this template -->
        <link href="/assets/css/bootstrap.css" rel="stylesheet">
        <link href="/assets/css/ui.css" rel="stylesheet">
        <link href="/assets/css/responsive.css" rel="stylesheet">
        
        <link href="/assets/css/all.min.css" rel="stylesheet">
        <script src="/assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="/assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    </head>
    <body>
       
@include('incs.navbar')




<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
        <div class="container">
          @if (!is_null($annonces_moto))
            <header class="section-heading">
              {{-- <h3 class="section-title">Nos Motos </h3> --}}
            </header><!-- sect-heading -->
            <div class="row">
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
                      @else {{ route('annonces.show', $annonce['id']) }} @endif" class="title md-9">{{ $annonce['titre'] }}</a><span class="md-3"><h6>{{ $annonce['ville'] }}</h6></span>
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
                    @else {{ route('annonces.voiture') }} @endif" class="btn btn-warning ml-1"><i class="fa fa-envelope" ></i>
                    </a>
                    </div> <!-- price-wrap.// -->
                  </figcaption>
                </div> 
              </div> <!-- col.// -->
            @endforeach
          @endif
            </div>
@include('incs.NosPartenaires')
@include('incs.footer')