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
                        <br>
                        <h6>Détails de l'annonce</h6>
                        <div class="col-md-5">titre </div>
                        <div class="col-md-1">:</div>
                        <div class="col md-6">{{$annonce->titre}}</div>
                        <div class="col-md-5">Description </div>
                        <div class="col-md-1">:</div>
                        <div class="col md-6">{{$annonce->description}}</div>
                        <div class="col-md-5">Prix par jour </div>
                        <div class="col-md-1">:</div>
                        <div class="col md-6">{{$annonce->prix_par_jour}}</div>
                        <div class="col-md-5">Date début </div>
                        <div class="col-md-1">:</div>
                        <div class="col md-6">{{$annonce->date_desponibilite}}</div>
                        <div class="col-md-5">Date Fin </div>
                        <div class="col-md-1">:</div>
                        <div class="col md-6">à ajouter </div>
                        <div class="col-md-5">Ville </div>
                        <div class="col-md-1">:</div>
                        <div class="col md-6">$annonce->ville </div>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Active</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#">Disabled</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade ">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection