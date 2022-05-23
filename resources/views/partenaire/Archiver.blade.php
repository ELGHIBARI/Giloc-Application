@extends('layouts.app')
@section('head')
<link href="{{ asset('css/annoncesList.css') }}" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">

@endsection


@section('content')


<div class="container  " style="width: 70%;">
  <h2 class="text-right">Voitures</h2>

  <div class="row ">
    @if (!is_null($annonces_voiture))
    @foreach($annonces_voiture as $annonce)


    <!--debut annonce -->
    <div class="col-sm-4 ">
      <div class="card w-100">
        @php $img_p = $annonce['images_voiture']
        @endphp

        <img src="{{asset('/images/partenaireUploads/Voitures/'.$img_p.'')}}" class="card-img-top" width=auto height="200">
        <div class="card-body pt-0 px-0">
          <div class="d-flex flex-row justify-content-between mt-3 px-3">
            <h6>{{$annonce['titre']}}</h6>
          </div>
          <div class="d-flex flex-row justify-content-between mt-3 px-3">
            <h5>Prix</h5>
            <h6>{{$annonce['prix_par_jour']}} MAD</h6>
          </div>
          <hr class="mt-2 mx-3">
          <div class="d-flex flex-row justify-content-between px-3 pb-4">
            <div class="d-flex flex-column"><span class="text-muted">A partir de {{$annonce['date_debut']}} Disponible jusqu'a <strong>{{$annonce['date_debut']}}</strong></span></div>
            <div class="d-flex flex-column">
            </div>
          </div>
          <div class="d-flex flex-row justify-content-between px-3 pb-4">

            <div class="d-flex flex-column"><span class="text-muted">premium </span></div>
            <div class="d-flex flex-column">

              <span class="mb-0">{{$annonce['premium']==1 ? "oui pour :".$annonce['duree_premium'] : "non"}} </span>
            </div>
          </div>

          <div class="d-flex flex-row justify-content-between px-3 pb-0">
            <div class="d-flex flex-column"><span class="text-muted">Etat</span></div>
            <div class="d-flex flex-column">
              <span class="mb-0">{{$annonce['etat']}}</span>
            </div>

          </div>

          <div class="mx-3 mt-3 mb-2">
            <div class="d-inline-block w-100">
              <a href="{{url('/annonces/voiture_details/'.$annonce['id'].'')}}" class="btn btn-primary w-100 mb-2">Voir Annonce</a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <!-- fin -->
    @endforeach
    @endif
  </div>
  <br>
  <hr style="height:2px;">
  <h2 class="text-right">Motos</h2>
  <div class="row ">
    @if (!is_null($annonces_moto))
    @foreach($annonces_moto as $annonce)
    <!--debut annonce -->
    <div class="col-sm-4 ">
      <div class="card w-100">
        @php $img_p=$annonce['images_moto']
        @endphp

        <img src="{{asset('/images/partenaireUploads/Motos/'.$img_p.'')}}" class="card-img-top" width=auto height="200">
        <div class="card-body pt-0 px-0">
          <div class="d-flex flex-row justify-content-between mt-3 px-3">
            <h6>{{$annonce['titre']}}</h6>
          </div>
          <div class="d-flex flex-row justify-content-between mt-3 px-3">
            <h5>Prix</h5>
            <h6>{{$annonce['prix_par_jour']}} MAD</h6>
          </div>
          <hr class="mt-2 mx-3">
          <div class="d-flex flex-row justify-content-between px-3 pb-4">
            <div class="d-flex flex-column"><span class="text-muted">A partir de {{$annonce['date_debut']}} Disponible jusqu'a <strong>{{$annonce['date_debut']}}</strong></span></div>
            <div class="d-flex flex-column">
            </div>
          </div>
          <div class="d-flex flex-row justify-content-between px-3 pb-4">

            <div class="d-flex flex-column"><span class="text-muted">premium </span></div>
            <div class="d-flex flex-column">

              <span class="mb-0">{{$annonce['premium']==1 ? "oui pour :".$annonce['duree_premium'] : "non"}} </span>
            </div>
          </div>

          <div class="d-flex flex-row justify-content-between px-3 pb-4">
            <div class="d-flex flex-column"><span class="text-muted">état</span></div>
            <div class="d-flex flex-column">
              <span class="mb-0">{{$annonce['etat']}}</span>
            </div>

          </div>

          <div class="mx-3 mt-3 mb-2">
            <div class="d-inline-block " style="width: 100%;">
              <a href="{{url('/annonces/moto_details/'.$annonce['id'].'')}}" class="btn btn-primary w-100 mb-2">Voir Annonce</a>
            </div>


          </div>

        </div>
      </div>
    </div>

    <!-- fin -->
    @endforeach
    @endif
  </div>
  <hr style="height:2px;">
  <h2 class="text-right">Vélos</h2>
  <div class="row ">


    @if (!is_null($annonces_velo))
    @foreach($annonces_velo as $annonce)
    <!--debut annonce -->
    <div class="col-sm-4 ">
      <div class="card w-100">
        @php $img_p=$annonce['images_velo']
        @endphp

        <img src="{{asset('/images/partenaireUploads/Vélos/'.$img_p.'')}}" class="card-img-top" width=auto height="200">
        <div class="card-body pt-0 px-0">
          <div class="d-flex flex-row justify-content-between mt-3 px-3">
            <h6>{{$annonce['titre']}}</h6>
          </div>
          <div class="d-flex flex-row justify-content-between mt-3 px-3">
            <h5>Prix</h5>
            <h6>{{$annonce['prix_par_jour']}} MAD</h6>
          </div>
          <hr class="mt-2 mx-3">
          <div class="d-flex flex-row justify-content-between px-3 pb-4">
            <div class="d-flex flex-column"><span class="text-muted text-right ">A partir de </span></div>
            <div class="d-flex flex-column">
              {{$annonce['date_debut']}}
            </div>
          </div>
          <div class="d-flex flex-row justify-content-between px-3 pb-4">
            <div class="d-flex flex-column"><span class="text-muted text-right ">  Disponible jusqu'a </span></div>
            <div class="d-flex flex-column">
              {{$annonce['date_fin']}}            </div>
          </div>
          <div class="d-flex flex-row justify-content-between px-3 pb-4">

            <div class="d-flex flex-column"><span class="text-muted">premium </span></div>
            <div class="d-flex flex-column">

              <span class="mb-0">{{$annonce['premium']==1 ? "oui pour :".$annonce['duree_premium'] : "non"}} </span>
            </div>
          </div>

          <div class="d-flex flex-row justify-content-between px-3 pb-4">
            <div class="d-flex flex-column"><span class="text-muted">Etat</span></div>
            <div class="d-flex flex-column">
              <span class="mb-0">{{$annonce['etat']}}</span>
            </div>

          </div>

          <div class="mx-3 ">
            <div class="d-inline-block " style="width: 100%;">
              <a href="{{url('/annonces/velo_details/'.$annonce['id'].'')}}" class="btn btn-primary w-100 mb-2">Voir Annonce</a>
            </div>


          </div>

        </div>
      </div>
    </div>

    <!-- fin -->

    @endforeach
    @endif

  </div>
</div>

@endsection
