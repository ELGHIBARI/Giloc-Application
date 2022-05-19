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
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
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
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content mt-3">
                                            <div class="tab-pane active" id="demande" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-md-5">Date de début de location</div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$demande->date_debut}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Date de fin de location : </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$demande->date_fin}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Prix total de location : </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$demande->prix_total}}</div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="annonce" role="tabpanel" aria-labelledby="annonce-tab">
                                                <div class="row">
                                                    <div class="col-md-5">titre </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$annonce->titre}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Description </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$annonce->description}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Prix par jour </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$annonce->prix_par_jour}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Date début </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$annonce->date_desponibilite}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Date Fin </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">à ajouter </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Ville </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$annonce->ville }}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Type d'annonce </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$annonce->premium==1 ? " Premium pour ".$annonce->duree_premium."" : "Normale"}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Publié le  </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{ $annonce->created_at }}</div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="vehicule" role="tabpanel" aria-labelledby="vehicule-tab">

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