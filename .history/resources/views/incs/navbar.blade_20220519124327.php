<header class="section-header">
  <nav class="navbar navbar-dark navbar-expand p-0" style="background-color: #2c2b02; background-image: linear-gradient(120deg, #ffb700, #fad4d4); ">
    <div class="container">
      <ul class="navbar-nav d-none d-md-flex mr-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('acceuil') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item"><a href="#" class="nav-link"> Call: +0000000000 </a></li>
      </ul> <!-- list-inline //  -->

    </div> <!-- container //  -->
  </nav> <!-- header-top-light.// -->

  <section class="header-main border-bottom">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-2 col-6">
          <a href="#" class="brand-wrap">
            GILOC
          </a> <!-- brand-wrap.// -->
        </div>
        <div class="col-lg-6 col-12 col-sm-12">
          <form action="{{route('client.recherche')}}" class="search" method="GET">
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
              <a href="{{ route('client.demande') }}" class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></a>
              <span class="badge badge-pill badge-danger notify">{{Auth::user()->unreadNotifications->count()}}</span>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">{{Auth::user()->unreadNotifications->count()}} Notifications</span>
                @foreach(Auth::user()->unreadNotifications as $notification)
                <div class="dropdown-divider"></div>
                @php $id=$notification->id;@endphp
                <a href="#" class="dropdown-item text-right" onclick="document.write('<?php $notification->markAsRead(); ?>');">
                  <small><strong>votre demande pour l'annonce </strong><br /> {{$notification->data['titre_annonce']}} a été refusé<br /><small><span class="float-right text-muted text-sm"> @php $date_envoi_dem = strtotime($notification->data['date_refus']);
                        $difference = time()-$date_envoi_dem; @endphp
                        @if($difference<=86400)@php $hours=abs(ceil($difference / 3600)); $minutes=$difference-$hours; $minutes=ceil($minutes/60); @endphp {{$hours}} heures{{ $minutes}} minutes @else {{ abs(ceil($difference / 86400)) }} jours @endif </a>
                      </span></small>
                </a>
                @endforeach
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
              </div>
            </div>
            <div class="widget-header  mr-3">
              <a href="{{ route('client.message') }}" class="icon icon-sm rounded-circle border"><i class="fa fa-envelope"></i></a>

              <span class="badge badge-pill badge-danger notify">0</span>
            </div>
            <div class="widget-header icontext">
              <a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></a>
              <div class="text">
                <div>
                  @if (Auth::user())
                  <a href="{{ route('login') }}"> {{ Auth::user()->nom_complet }}</a> |
                  <a class="text-right" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form> @else
                  <a href="{{ route('login') }}">Sign in</a> |
                  <a href="{{ route('register') }}"> Register</a>
                  @endif
                </div>
              </div>
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