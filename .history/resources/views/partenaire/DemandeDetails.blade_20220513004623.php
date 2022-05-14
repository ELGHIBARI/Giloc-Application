@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($Annonces as $annonce)
                @foreach($annonce->demandeAnnonce as $demande)
                <div class="card-header text-right">Demande du client : {{$demande->userDemande->nom_complet}}</div>
                <div class="card-body text-right">
                <h6>D</h6>
                <div class="row">
                <div class="col-md-6"> </div>

                
                </div>
                </div>
                @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection