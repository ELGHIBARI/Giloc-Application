@extends('layouts.app')
@section('head')
<link href="{{ asset('css/AnnonceDetailStyle.css') }}" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">

@endsection


@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="col-xl-12 ml-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4 text-right">Commentaires Positifs </h4>
                    @if($rating!=null)
                    @foreach($rating as $rate)
                    @if($rate['type_commentaire']=='positif')
                    <ul class="list-unstyled activity-wid mb-0">
                        <li class="activity-list activity-border">

                            <div class="activity-icon avatar-sm">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="avatar-sm rounded-circle" alt="">
                            </div>
                            <div class="media">
                                <div class="me-3">
                                    <h5 class="font-size-15 mb-1">{{$rate['client']['nom_complet']}}</h5>
                                    <p class=" d-inline-block w-100 text-muted font-size-15 mb-0">{{$rate['commentaire']}}</p>
                                    <h6 class="font-size-15 mb-1"></h6>
                                    <!-- Rating-->
                                    <div class="text-center">

                                        @if($rate['evaluation_etoile']!=null)
                                        @php
                                        $r=$rate['evaluation_etoile']
                                        @endphp
                                        @for($i=0;$i!=5;$i++)
                                        @if($i+1<$r+1) <span class="fa fa-star checked"></span>@endif
                                            @if($i+1>=$r+1)<span class="fa fa-star"></span>@endif
                                            @endfor
                                            @else<span class="text"> Pas des evaluation</span>@endif
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="text-end d-none d-md-block">
                                        <p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="fa fa-calendar font-size-15 text-primary"></i>
                                            @php $date_envoi_dem = strtotime($rate['created_at']);
                                            $difference = time()-$date_envoi_dem;
                                            @endphp
                                            {{ abs(round($difference / 86400)) }} days
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    @endif
                    @endforeach
                    @endif
                    <h4 class="header-title mb-4 text-right">Commentaires negatifs </h4>
                    @if($rating!=null)
                    @foreach($rating as $rate)
                    @if($rate['type_commentaire']=='negatif')
                    <ul class="list-unstyled activity-wid mb-0">
                        <li class="activity-list activity-border">

                            <div class="activity-icon avatar-sm">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="avatar-sm rounded-circle" alt="">
                            </div>
                            <div class="media">
                                <div class="me-3">
                                    <h5 class="font-size-15 mb-1">{{$rate['client']['nom_complet']}}</h5>
                                    <p class=" d-inline-block w-100 text-muted font-size-15 mb-0">{{$rate['commentaire']}}</p>
                                    <h6 class="font-size-15 mb-1"></h6>
                                    <!-- Rating-->
                                    <div class="text-center">

                                        @if($rate['evaluation_etoile']!=null)
                                        @php
                                        $r=$rate['evaluation_etoile']
                                        @endphp
                                        @for($i=0;$i!=5;$i++)
                                        @if($i+1<$r+1) <span class="fa fa-star checked"></span>@endif
                                            @if($i+1>=$r+1)<span class="fa fa-star"></span>@endif
                                            @endfor
                                            @else<span class="text"> Pas des evaluation</span>@endif
                                    </div>
                                </div>

                                <div class="media-body">
                                    <div class="text-end d-none d-md-block">
                                        <p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="fa fa-calendar font-size-15 text-primary"></i>
                                            @php $date_envoi_dem = strtotime($rate['created_at']);
                                            $difference = time()-$date_envoi_dem;
                                            @endphp
                                            {{ abs(round($difference / 86400)) }} days
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    @endif
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if(isset($annonces_voiture))
    <div class="col-md-8 ">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="card-title d-block w-75">
                            <h3>{{$annonces_voiture[0]['titre']}}</h3>
                        </div>
                        @php
                        $style=($annonces_voiture[0]['etat']=='activee'||$annonces_voiture[0]['etat']=='en attente'||$annonces_voiture[0]['etat']=='en location' ? "pointer-events: none;background-color: gray;":"");
                        $style1=($annonces_voiture[0]['etat']=='archivee' ||$annonces_voiture[0]['etat']=='en attente'||$annonces_voiture[0]['etat']=='en location' ? "pointer-events: none;background-color: gray;":"");

                        @endphp


                        <div class="d-block float-right w-25 ">

                            <a href="{{url('/annonce/archive/voiture/'.$annonces_voiture[0]['id'])}}" class="btn btn-primary  mb-1" style="{{$style1}}">Archiver </a>
                            <a href="{{url('/annonce/active/voiture/'.$annonces_voiture[0]['id'])}}" class="btn btn-primary mb-1" style="{{$style}}">Activer</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6  ">
                            @php $img_p=$annonces_voiture[0]['images_voiture'];
                            @endphp
                            <div class="white-box text-center mt-3"><img src="{{asset('/images/partenaireUploads/Voitures/'.$img_p[0].'')}}" class="w-100"></div>
                            <!-- Rating-->

                            <div class="text-center">
                                @if($rating!=null)
                                @php
                                $somme=0;
                                foreach($rating as $a)
                                $somme=$somme+$a['evaluation_etoile'];
                                $r = round($somme/count($rating), 1); 
                                @endphp
                                <h2>{{$r}}/5</h2>
                                @for($i=0;$i!=5;$i++)
                                @if($i+1<$r+1) <span class="fa fa-star checked"></span>
                                    @endif
                                    @if($i+1>=$r+1)
                                    <span class="fa fa-star"></span>
                                    @endif
                                    @endfor
                                    @else
                                    <span class="text"> Pas des evaluation</span>
                                    @endif

                            </div>
                            <div class="text-center mt-4">
                                <a href="{{url('/annonces/voiture_details/'.$annonces_voiture[0]['id'])}}" class="btn btn-primary  mb-1">Voir Demande/Message </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <h4 class="box-title mt-0">Description</h4>

                            <p> {{$annonces_voiture[0]['description']}}</p>
                            <h2 class="mt-1">
                                {{$annonces_voiture[0]['prix_par_jour']}}<small class="text-success"> MAD/jour</small>
                            </h2>

                            <h3 class="box-title mt-1">Les details de l'annonce</h3>
                            <ul class="list-unstyled w-100">
                                <li><i class="fa fa-check text-success pl-3"></i>type : {{$annonces_voiture[0]['type_vehicule']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Date de Desponibilite : {{$annonces_voiture[0]['date_disponibilite']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Ville : {{$annonces_voiture[0]['ville']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Etat : {{$annonces_voiture[0]['etat']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Premium : {{$annonces_voiture[0]['premium']}} </li>
                                <li> <i class="fa fa-check text-success pl-3"></i>Date Premium : {{$annonces_voiture[0]['premium']==1 ? "".$annonces_voiture[0]['duree_premium']."" : "0"}}</li>
                            </ul>
                            <h3 class="box-title mt-1">Les details de vehicule </h3>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-check text-success pl-3"></i>Marque : {{$annonces_voiture[0]['marque']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Modele : {{$annonces_voiture[0]['modele']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Annee modele : {{$annonces_voiture[0]['annee_modele']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Puissance fiscale : {{$annonces_voiture[0]['Puissance_fiscale']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Nombre places : {{$annonces_voiture[0]['nombre_places']}} </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if(isset($annonces_moto))
    <div class="col-md-8 ">
        <div class="container">
            <div class="card" style="background-color:#f6e58d ;">
                <div class="card-body">
                    <div class="row">
                        <div class="card-title d-block w-75">
                            <h3>{{$annonces_moto[0]['titre']}}</h3>
                        </div>
                        @php
                        $style=($annonces_moto[0]['etat']=='activee'||$annonces_moto[0]['etat']=='en attente'||$annonces_moto[0]['etat']=='en location' ? "pointer-events: none;background-color: gray;":"");
                        $style1=($annonces_moto[0]['etat']=='archivee' ||$annonces_moto[0]['etat']=='en attente'||$annonces_moto[0]['etat']=='en location' ? "pointer-events: none;background-color: gray;":"");

                        @endphp


                        <div class="d-block float-right w-25 ">

                            <a href="{{url('/annonce/archive/moto/'.$annonces_moto[0]['id'])}}" class="btn btn-primary  mb-1" style="{{$style1}}">Archiver </a>
                            <a href="{{url('/annonce/active/moto/'.$annonces_moto[0]['id'])}}" class="btn btn-primary mb-1" style="{{$style}}">Activer</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6  ">
                            @php $img_p=$annonces_moto[0]['images_moto']
                            @endphp
                            <div class="white-box text-center mt-3"><img src="{{asset('/images/partenaireUploads/Motos/'.$img_p[0].'')}}" class="w-100"></div>
                            <!-- Rating-->

                            <div class="text-center">
                                @if($rating!=null)
                                @php
                                $somme=0;
                                foreach($rating as $a)
                                $somme=$somme+$a['evaluation_etoile'];
                                $r = round($somme/count($rating), 1); 
                                @endphp
                                <h2>{{$r}}/5</h2>
                                @for($i=0;$i!=5;$i++)
                                @if($i+1<$r+1) <span class="fa fa-star checked"></span>
                                    @endif
                                    @if($i+1>$r+1)
                                    <span class="fa fa-star"></span>
                                    @endif
                                    @endfor
                                    @else
                                    <span class="text"> Pas des evaluation</span>
                                    @endif

                            </div>
                            <div class="text-center mt-4">
                                <a href="{{url('/annonces/moto_details/'.$annonces_moto[0]['id'])}}" class="btn btn-primary  mb-1">Voir Demande/Message </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <h4 class="box-title mt-0">Description</h4>

                            <p> {{$annonces_moto[0]['description']}}</p>
                            <h2 class="mt-1">
                                {{$annonces_moto[0]['prix_par_jour']}}<small class="text-success"> MAD/jour</small>
                            </h2>

                            <h3 class="box-title mt-1">Les details de l'annonce</h3>
                            <ul class="list-unstyled w-100">
                                <li><i class="fa fa-check text-success pl-3"></i>type : {{$annonces_moto[0]['type_vehicule']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Date de Desponibilite : {{$annonces_moto[0]['date_disponibilite']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Ville : {{$annonces_moto[0]['ville']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Etat : {{$annonces_moto[0]['etat']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Premium : {{$annonces_moto[0]['premium']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Date Premium : {{$annonces_moto[0]['premium']==1 ? "".$annonces_moto[0]['duree_premium']."" : "0"}}</li>
                            </ul>
                            <h3 class="box-title mt-1">Les details de vehicule </h3>
                            <ul class="list-unstyled">

                                <li><i class="fa fa-check text-success pl-3"></i>Marque : {{$annonces_moto[0]['marque']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Modele : {{$annonces_moto[0]['modele']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Annee modele : {{$annonces_moto[0]['Annee_Modele']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Cylindree : {{$annonces_moto[0]['Cylindree']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Nombre Roues : {{$annonces_moto[0]['Nombre_roues']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Nombre casques : {{$annonces_moto[0]['nombre_casques']}} </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if(isset($annonces_velo))
    <div class="col-md-8 ">
        <div class="container">
            <div class="card" style="background-color:#f6e58d ;">
                <div class="card-body">
                    <div class="row">
                        <div class="card-title d-block w-75">
                            <h3>{{$annonces_velo[0]['titre']}}</h3>
                        </div>
                        @php
                        $style=($annonces_velo[0]['etat']=='activee'||$annonces_velo[0]['etat']=='en attente'||$annonces_velo[0]['etat']=='en location' ? "pointer-events: none;background-color: gray;":"");
                        $style1=($annonces_velo[0]['etat']=='archivee' ||$annonces_velo[0]['etat']=='en attente'||$annonces_velo[0]['etat']=='en location' ? "pointer-events: none;background-color: gray;":"");

                        @endphp


                        <div class="d-block float-right w-25 ">

                            <a href="{{url('/annonce/archive/velo/'.$annonces_velo[0]['id'])}}" class="btn btn-primary  mb-1" style="{{$style1}}">Archiver </a>
                            <a href="{{url('/annonce/active/velo/'.$annonces_velo[0]['id'])}}" class="btn btn-primary mb-1" style="{{$style}}">Activer</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6  ">
                            @php $img_p=$annonces_velo[0]['images_velo']
                            @endphp
                            <div class="white-box text-center mt-3"><img src="{{asset('/images/partenaireUploads/Vélos/'.$img_p[0].'')}}" class="w-100"></div>
                            <!-- Rating-->
                            <div class="text-center">
                                @if($rating!=null)
                                @php
                                $somme=0;
                                foreach($rating as $a)
                                $somme=$somme+$a['evaluation_etoile'];
                                $r = round($somme/count($rating), 1); 
                                @endphp
                                <h2>{{$r}}/5</h2>
                                @for($i=0;$i!=5;$i++)
                                @if($i+1<$r+1) <span class="fa fa-star checked"></span>
                                    @endif
                                    @if($i+1>=$r+1)
                                    <span class="fa fa-star"></span>
                                    @endif
                                    @endfor
                                    @else
                                    <span class="text"> Pas des evaluation</span>
                                    @endif

                            </div>
                            <div class="text-center mt-4">
                                <a href="{{url('/annonces/velo_details/'.$annonces_velo[0]['id'])}}" class="btn btn-primary  mb-1">Voir Demande/Message </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <h4 class="box-title mt-0">Description</h4>

                            <p> {{$annonces_velo[0]['description']}}</p>
                            <h2 class="mt-1">
                                {{$annonces_velo[0]['prix_par_jour']}}<small class="text-success"> MAD/jour</small>
                            </h2>

                            <h3 class="box-title mt-1">Les details de l'annonce</h3>
                            <ul class="list-unstyled w-100">
                                <li><i class="fa fa-check text-success pl-3"></i>type : {{$annonces_velo[0]['type_vehicule']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Date de Desponibilite : {{$annonces_velo[0]['date_disponibilite']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Ville : {{$annonces_velo[0]['ville']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Etat : {{$annonces_velo[0]['etat']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Premium : {{$annonces_velo[0]['premium']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Date Premium : {{$annonces_velo[0]['premium']==1 ? "".$annonces_velo[0]['duree_premium']."" : "0"}}</li>
                            </ul>
                            <h3 class="box-title mt-1">Les details de vehicule </h3>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-check text-success pl-3"></i>Marque : {{$annonces_velo[0]['marque']}} </li>
                                <li><i class="fa fa-check text-success pl-3"></i>Taille : {{$annonces_velo[0]['taille']}} </li>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>




@endsection