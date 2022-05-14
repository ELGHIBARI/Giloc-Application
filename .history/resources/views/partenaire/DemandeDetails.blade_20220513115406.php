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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#demande" role="tab" aria-controls="demande" aria-selected="true">Détails de la demande</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#annonce" role="tab" aria-controls="annonce" aria-selected="false">Détails de l'annonce</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#vehicule" role="tab" aria-controls="vehicule" aria-selected="false">Détails de véhicule</a>
                                    </li>
                                </ul>
                            <div class="card-body">
                                <div class="tab-content mt-3">
                                    <div class="tab-pane active" id="demande" role="tabpanel">
                                    <div class="col-md-5">Date de début de location</div>
                        <div class="col-md-1">:</div>
                        <div class="col md-6">{{$demande->date_debut}}</div>
                        <div class="col-md-5">Date de fin de location : </div>
                        <div class="col-md-1">:</div>
                        <div class="col md-6">{{$demande->date_fin}}</div>
                        <div class="col-md-5">Prix total de location : </div>
                        <div class="col-md-1">:</div>
                        <div class="col md-6">{{$demande->prix_total}}</div> 
                                    </div>

                                    <div class="tab-pane" id="annonce" role="tabpanel" aria-labelledby="annonce-tab">
                                        <p class="card-text">First settled around 1000 BCE and then founded as the Etruscan Felsina about 500 BCE, it was occupied by the Boii in the 4th century BCE and became a Roman colony and municipium with the name of Bononia in 196 BCE. </p>
                                        <a href="#" class="card-link text-danger">Read more</a>
                                    </div>

                                    <div class="tab-pane" id="vehicule" role="tabpanel" aria-labelledby="vehicule-tab">
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