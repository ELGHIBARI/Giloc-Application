@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right">{{ __('Espace Partenaire') }}</div>

                <div class="card-body text-right">
                    @foreach($Annonces as $annonce)
                    @foreach($annonce->demandeAnnonce as $demande)
                     {{ $demande->prix_total }}
                      {{$demande->userDemande->nom_complet }}
                      {{ $annonce->titre; }}
                    @endforeach
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection