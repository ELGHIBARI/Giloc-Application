@extends('layouts.app')
<style>
    body {
        padding: 2rem 0rem;
    }
</style>
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

                @endforeach
                @endforeach
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#history" role="tab" aria-controls="history" aria-selected="false">History</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#deals" role="tab" aria-controls="deals" aria-selected="false">Deals</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Bologna</h4>
                                <h6 class="card-subtitle mb-2">Emilia-Romagna Region, Italy</h6>

                                <div class="tab-content mt-3">
                                    <div class="tab-pane active" id="description" role="tabpanel">
                                        <p class="card-text">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p>
                                        <a href="#" class="card-link text-danger">Read more</a>
                                    </div>

                                    <div class="tab-pane" id="history" role="tabpanel" aria-labelledby="history-tab">
                                        <p class="card-text">First settled around 1000 BCE and then founded as the Etruscan Felsina about 500 BCE, it was occupied by the Boii in the 4th century BCE and became a Roman colony and municipium with the name of Bononia in 196 BCE. </p>
                                        <a href="#" class="card-link text-danger">Read more</a>
                                    </div>

                                    <div class="tab-pane" id="deals" role="tabpanel" aria-labelledby="deals-tab">
                                        <p class="card-text">Immerse yourself in the colours, aromas and traditions of Emilia-Romagna with a holiday in Bologna, and discover the city's rich artistic heritage.</p>
                                        <a href="#" class="btn btn-danger btn-sm">Get Deals</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#bologna-list a').on('click', function(e) {
        e.preventDefault()
        $(this).tab('show')
    })
</script>
@endsection