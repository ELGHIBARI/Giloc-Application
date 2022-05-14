@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($Annonces as $annonce)
                @foreach($annonce->demandeAnnonce as $demande)
                <div class="card-header text-right">Demande du client : {{$demande->userDemande->nom_complet}} pour l'annonce $annonce->titre</div>
                <div class="card-body text-right">
                <h6>Détails de la demande</h6>
                <div class="row">
                <div class="col-md-5">Date de début de location</div>
                <div class="col-md-1">:</div>
                <div class="col md-6">{{$demande->date_debut}}</div>
                <div class="col-md-5">Date de fin de location : </div>
                <div class="col-md-1">:</div>
                <div class="col md-6">{{$demande->date_fin}}</div>
                <div class="col-md-5">Prix total de location : </div>
                <div class="col-md-1">:</div>
                <div class="col md-6">{{$demande->prix_total}}</div>
                <h6>Détails de l'annonce</h6>
                <div class="col-md-6">titre: </div>
                <div class="col md-6">{{$annonce}}</div>
                </div>
                </div>
                @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection