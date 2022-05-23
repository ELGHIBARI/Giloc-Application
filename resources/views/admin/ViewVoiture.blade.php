@extends('layouts.app')

@section('content')

<div class="container">
  <h2>Voiture</h2>

  <div class="row ">
    @if (!is_null($annonces_voiture))
   


    <!--debut annonce -->
    <div class="col-sm-4 ">
      <div class="card w-100">
        
        @php $img_p=$annonces_voiture['images_voiture']
        @endphp

        <img src="{{asset('/images/partenaireUploads/Voitures/'.$img_p.'')}}" class="card-img-top" width="100%">
        <div class="card-body pt-0 px-0">
          <div class="d-flex flex-row justify-content-between mt-3 px-3">
            <h6>{{$annonces_voiture['marque']}}</h6>
          </div>
          <div class="d-flex flex-row justify-content-between mt-3 px-3">
            <h5>Prix</h5>
            <h6>{{$annonces_voiture['modele']}} MAD</h6>
          </div>
          <hr class="mt-2 mx-3">
          <div class="d-flex flex-row justify-content-between px-3 pb-4">
            <div class="d-flex flex-column"><span class="text-muted">Desponible jusqu'a</span></div>
            <div class="d-flex flex-column">
              <h5 class="mb-0">{{$annonces_voiture['annee_modele']}}</h5>
            </div>
          </div>
          <div class="d-flex flex-row justify-content-between px-3 pb-4">

            <div class="d-flex flex-column"><span class="text-muted">premium </span></div>
            <div class="d-flex flex-column">

              <h5 class="mb-0">{{$annonces_voiture['premium']==1 ? "oui pour :".$annonce['duree_premium']."jours" : "non"}} </h5>
            </div>
          </div>

          <div class="d-flex flex-row justify-content-between px-3 pb-4">
            <div class="d-flex flex-column"><span class="text-muted">Etat</span></div>
            <div class="d-flex flex-column">
              <h5 class="mb-0">{{$annonces_voiture['Type_carburant']}}</h5>
            </div>

          </div>



          </div>

        </div>
      </div>
    </div>

    <!-- fin -->
   
    @endif
  </div>
  <br>
  
  </div>


  </div>
</div>
@endsection