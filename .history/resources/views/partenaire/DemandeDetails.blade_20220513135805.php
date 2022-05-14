@extends('layouts.app')
<style>        .gard {
            background-color: #2c2b02;
            background-image: linear-gradient(120deg, #fad4d4, #ffb700);
        }</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($Annonces as $annonce)
                @foreach($annonce->demandeAnnonce as $demande)
                <div class="card-header text-right">Demande du client : <strong class="text-red">{{$demande->userDemande->nom_complet}}</strong> pour l'annonce <strong class=" text-red">{{$annonce->titre}}</strong></div>
                <div class="card-body text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header gradInverse">
                                        <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active text-red" href="#demande" role="tab" aria-controls="demande" aria-selected="true">Détails de la demande</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-red" href="#annonce" role="tab" aria-controls="annonce" aria-selected="false">Annonce associée</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-red" href="#vehicule" role="tab" aria-controls="vehicule" aria-selected="false">Véhicule associée</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content mt-3">
                                            <div class="tab-pane active" id="demande" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-5">Date de début de location</strong></div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$demande->date_debut}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Date de fin de location :</strong> </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$demande->date_fin}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Prix total de location :</strong> </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$demande->prix_total}}</div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="annonce" role="tabpanel" aria-labelledby="annonce-tab">
                                                <div class="row">
                                                    <div class="col-md-5">Titre</strong> </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$annonce->titre}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Description</strong> </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$annonce->description}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Prix par jour</strong> </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$annonce->prix_par_jour}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Date début</strong> </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$annonce->date_desponibilite}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Date Fin</strong> </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">à ajouter </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Ville</strong> </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$annonce->ville }}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Type d'annonce</strong> </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$annonce->premium==1 ? " Premium pour ".$annonce->duree_premium."" : "Normale"}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Type de véhicule</strong> </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$annonce->type_vehicule}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Publié le  </strong></div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{ $annonce->created_at }}</div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="vehicule" role="tabpanel" aria-labelledby="vehicule-tab">
                                            <div class="row">
                                                    <div class="col-md-5">Titre </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$annonce->titre}}</div>
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

            @endforeach
            @endforeach
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