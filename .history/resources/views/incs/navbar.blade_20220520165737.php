<header class="section-header">
  <nav class="navbar navbar-expand-md navbar-light navcolor shadow-sm" style="background-color: #2c2b02; background-image: linear-gradient(120deg, #ffb700, #fad4d4); ">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        GILOC
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto">
          <li class="nav-item"><a class="nav-link" href="{{ route('client.demande') }}">Mes réservations</a></li>
          <li class="nav-item"><a class="nav-link" href="#">About</a></li>
        </ul>
      </div>
      <ul class="navbar-nav">
        <li class="nav-item"><a href="#" class="nav-link"> Call: +0000000000 </a></li>
      </ul> <!-- list-inline //  -->

    </div> <!-- container //  -->
  </nav> <!-- header-top-light.// -->

  <section class="header-main border-bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-6 col-12">
          <div class="widgets-wrap float-md-right">
            <div class="widget-header icontext mr-0">
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
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-sm-10 col-12">
          <form action="{{route('client.recherche')}}" class="search" method="GET">
            <div class="input-group w-100">
              <input type="text" class="form-control" placeholder="Search" name="search">
              <div class="input-group-append">
                <button class="btn btn-warning" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div> <!-- search-wrap .end// -->
        <div class="col-lg-4 col-sm-6 col-12">
          <div class="widgets-wrap float-md-right">
            <div class="widget-header  mr-3">
              <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown">
                  <a class="icon icon-sm rounded-circle border" data-toggle="dropdown" href="#"><i class="fa fa-shopping-cart"></i>
                    <span class="badge badge-pill badge-danger notify">{{Auth::user()->unreadNotifications->where('type','App\Notifications\RefusDemandeNotification')->count() + Auth::user()->unreadNotifications->where('type','App\Notifications\AcceptNotification')->count()}}</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">{{Auth::user()->unreadNotifications->where('type','App\Notifications\RefusDemandeNotification')->count() + Auth::user()->unreadNotifications->where('type','App\Notifications\AcceptNotification')->count()}} Notifications</span>
                    @foreach(Auth::user()->unreadNotifications->where('type','App\Notifications\RefusDemandeNotification') as $notification)
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('client.demande') }}" class="dropdown-item text-left" onclick="document.write('<?php $notification->markAsRead(); ?>');">
                      <small><strong>Refus de demande pour l'annonce</strong><br /> {{$notification->data['titre_annonce']}}<br /></small> <small><span class="float-right text-muted text-sm"> @php $date_envoi_dem = strtotime($notification->data['date']);
                          $difference = time()-$date_envoi_dem; @endphp
                          @if($difference<=86400)@php $hours=abs(ceil($difference / 3600)); $minutes=$difference-$hours; $minutes=ceil($minutes/60); @endphp {{$hours}} heures{{ $minutes}} minutes @else {{ abs(ceil($difference / 86400)) }} jours @endif </a>
                        </span></small>
                    </a>
                    @endforeach
                    @foreach(Auth::user()->unreadNotifications->where('type','App\Notifications\AcceptNotification') as $notification)
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('client.demande') }}" class="dropdown-item text-left" onclick="document.write('<?php $notification->markAsRead(); ?>');">
                      <small><strong>acceptation de demande pour l'annonce</strong><br /> {{$notification->data['titre_annonce']}}<br /></small> <small><span class="float-right text-muted text-sm"> @php $date_envoi_dem = strtotime($notification->data['date']);
                          $difference = time()-$date_envoi_dem; @endphp
                          @if($difference<=86400)@php $hours=abs(ceil($difference / 3600)); $minutes=$difference-$hours; $minutes=ceil($minutes/60); @endphp {{$hours}} heures{{ $minutes}} minutes @else {{ abs(ceil($difference / 86400)) }} jours @endif </a>
                        </span></small>
                    </a>
                    @endforeach
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                  </div>
                </li>
              </ul>
            </div>
            <div class="widget-header  mr-3">
              <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown">
                  <a class="icon icon-sm rounded-circle border" data-toggle="dropdown" href="#"><i class="fa fa-envelope"></i>
                    <span class="badge badge-pill badge-danger notify">{{Auth::user()->unreadNotifications->where('type','App\Notifications\MessageNotification')->count()}}</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">{{Auth::user()->unreadNotifications->where('type','App\Notifications\MessageNotification')->count()}} Notifications</span>
                    @foreach(Auth::user()->unreadNotifications->where('type','App\Notifications\MessageNotification') as $notification)
                    <div class="dropdown-divider"></div>
                    @php $url=$notification->data['url'] @endphp
                    <a href="{{url($url)}}" class="dropdown-item text-left" onclick="document.write('<?php $notification->markAsRead(); ?>');">
                      <small><strong>message pour l'annonce</strong><br /> {{$notification->data['titre_annonce']}}<br />{{$notification->data['contenu']}}<br />par {{$notification->data['sender']}}</small> <small><span class="float-right text-muted text-sm"> @php $date_envoi_dem = strtotime($notification->data['date_envoi']);
                          $difference = time()-$date_envoi_dem; @endphp
                          @if($difference<=86400)@php $hours=abs(ceil($difference / 3600)); $minutes=$difference-$hours; $minutes=ceil($minutes/60); @endphp {{$hours}} heures{{ $minutes}} minutes @else {{ abs(ceil($difference / 86400)) }} jours @endif </a>
                        </span></small>
                    </a>
                    @endforeach
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                  </div>
                </li>
              </ul>
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