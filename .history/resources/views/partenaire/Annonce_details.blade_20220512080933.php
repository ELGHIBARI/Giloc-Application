@extends('layouts.app')
@section('head')
<link href="{{ asset('css/AnnonceDetailStyle.css') }}" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
<style>
    .btn-primary:hover,
    .btn-primary:focus,
    .btn-primary:active {
        background-color: #bc3906;
        color: #FFF;
        border-color: #bc3906;
    }
</style>
@endsection


@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4 text-right">Demandes </h4>
                    <ul class="list-unstyled activity-wid mb-0">
                        <li class="activity-list activity-border">
                            <div class="activity-icon avatar-sm">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="avatar-sm rounded-circle" alt="">
                            </div>
                            <div class="media">
                                <div class="me-3">
                                    <h5 class="font-size-15 mb-1">Demande de location</h5>
                                    <p class="text-muted font-size-14 mb-0">Anass el 1</p>
                                </div>

                                <div class="media-body">
                                    <div class="text-end d-none d-md-block">
                                        <p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="fa fa-calendar font-size-15 text-primary"></i>
                                            3 days</p>
                                    </div>
                                </div>

                            </div>
                        </li>


                    </ul>
                    <h4 class="header-title mb-4 text-right">Messages </h4>
                    <ul class="list-unstyled activity-wid mb-0">
                        <li class="activity-list activity-border">
                            <div class="activity-icon avatar-sm">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="avatar-sm rounded-circle" alt="">
                            </div>
                            <div class="media">
                                <div class="me-3">
                                    <h5 class="font-size-15 mb-1">Message</h5>
                                    <p class="text-muted font-size-14 mb-0">James Raphael</p>
                                </div>

                                <div class="media-body">
                                    <div class="text-end d-none d-md-block">
                                        <p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="fa fa-calendar font-size-15 text-primary"></i>
                                            3 days</p>
                                    </div>
                                </div>

                            </div>
                        </li>


                    </ul>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-right">{{$annonces_voiture[0]['titre']}}</h3>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            @php $img_p=$annonces_voiture[0]['images_voiture']
                            @endphp
                            <div class="white-box text-center "><img src="{{asset('/images/partenaireUploads/Voitures/'.$img_p.'')}}" class="w-100"></div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <h4 class="box-title mt-0 text-right">Description</h4>
                            <p class="text-right"> {{$annonces_voiture[0]['description']}}</p>
                            <h6 class="text-right" class="mt-1">
                                {{$annonces_voiture[0]['prix_par_jour']}}<small class="text-success"> MAD/jour</small>
                            </h6>

                            <h6 class="box-title mt-1 text-right">Les details de l'annonce</h6>
                            <ul class="list-unstyled">
                                <li class="text-right"><i class="fa fa-check text-success pl-3"></i>type : {{$annonces_voiture[0]['type_vehicule']}} </li>
                                <li class="text-right"><i class="fa fa-check text-success pl-3"></i>Date de Desponibilite : {{$annonces_voiture[0]['date_disponibilite']}} </li>
                                <li class="text-right"><i class="fa fa-check text-success pl-3"></i>Ville : {{$annonces_voiture[0]['ville']}} </li>
                                <li class="text-right"><i class="fa fa-check text-success pl-3"></i>Etat : {{$annonces_voiture[0]['etat']}} </li>
                                <li class="text-right"><i class="fa fa-check text-success pl-3"></i>Premium : {{$annonces_voiture[0]['premium']}} </li>
                                <li class="text-right"><i class="fa fa-check text-success pl-3"></i>Date Premium : {{$annonces_voiture[0]['premium']==1 ? "".$annonces_voiture[0]['duree_premium']."" : "0"}}</li>
                            </ul>
                            <h6 class="box-title mt-1 text-right">Les details de vehicule </h6>
                            <ul class="list-unstyled">
                                <li class="text-right"><i class="fa fa-check text-success pl-3"></i>Marque : {{$annonces_voiture[0]['marque']}} </li>
                                <li class="text-right"><i class="fa fa-check text-success pl-3"></i>Modele : {{$annonces_voiture[0]['modele']}} </li>
                                <li class="text-right"><i class="fa fa-check text-success pl-3"></i>Annee modele : {{$annonces_voiture[0]['annee_modele']}} </li>
                                <li class="text-right"><i class="fa fa-check text-success pl-3"></i>Puissance fiscale : {{$annonces_voiture[0]['Puissance_fiscale']}} </li>
                                <li class="text-right"><i class="fa fa-check text-success pl-3"></i>Nombre places : {{$annonces_voiture[0]['nombre_places']}} </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
</div>


@endsection