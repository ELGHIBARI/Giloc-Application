@extends('layouts.app')
<style>
    .gard {
        background-color: #2c2b02;
        background-image: linear-gradient(120deg, #fad4d4, #ffb700);
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($Annonce as $annonce)
                @php $id_annonce=$annonce->id; @endphp
                @foreach($annonce->demandeAnnonce as $demande)
                @php $id_demande=$demande->id; @endphp
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
                                            @endforeach
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
                                                    <div class="col-md-5">Publiée le </strong></div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{ $annonce->created_at }}</div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="tab-pane" id="vehicule" role="tabpanel" aria-labelledby="annonce-tab">
                                                <div id="carouselExampleIndicators" class="carousel" data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        @for($i=0;$i<=count($images)-1;$i++) <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="img{{$i}}">
                                                            </li>
                                                            @endfor
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        @if($annonce->type_vehicule=="voiture")
                                                        @php $i=0 @endphp
                                                        @foreach($images as $image)
                                                        <div class="carousel-item img{{$i}}">
                                                            <img class="d-block w-100" style="height : 400px;" src="{{asset('/images/partenaireUploads/Voitures/'.$image.'')}}" alt="First slide">
                                                        </div>
                                                        @php $i++ ;@endphp
                                                        @endforeach
                                                        @endif
                                                        @if($annonce->type_vehicule=="moto")
                                                        @php $i=0 @endphp
                                                        @foreach($images as $image)
                                                        <div class="carousel-item img{{$i}}">
                                                            <img class="d-block w-100 h-60" src="{{asset('/images/partenaireUploads/Motos/'.$image.'')}}" alt="First slide">
                                                        </div>
                                                        @php $i++ ;@endphp
                                                        @endforeach
                                                        @endif
                                                        @if($annonce->type_vehicule=="velo")
                                                        @php $i=0 @endphp
                                                        @foreach($images as $image)
                                                        <div class="carousel-item img{{$i}}">
                                                            <img class="d-block w-100" style="height : 400px;" src="{{asset('/images/partenaireUploads/Vélos/'.$image.'')}}" alt="First slide">
                                                        </div>
                                                        @php $i++ ;@endphp
                                                        @endforeach
                                                        @endif
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <br>
                                                <h6 style="color : #fad4d4;">
                                                    <hr>
                                                </h6>
                                                @foreach($vehicules as $vehicule)
                                                @if($annonce->type_vehicule=="voiture")
                                                <div class="row">
                                                    <div class="col-md-5">Marque </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$vehicule->marque}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Modèle </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$vehicule->modele}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Année modèle </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$vehicule->annee_modele}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Type carburant </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$vehicule->Type_carburant}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Puissance fiscale </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$vehicule->Puissance_fiscale}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Nombre de place </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$vehicule->nombre_places}}</div>
                                                </div>
                                                @endif
                                                @if($annonce->type_vehicule=="moto")
                                                <div class="row">
                                                    <div class="col-md-5">Marque </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$vehicule->marque}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Modèle </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$vehicule->modele}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Année modèle </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$vehicule->Annee_Modele}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Cylindrée </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$vehicule->Cylindree}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Nombre de roues </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$vehicule->Nombre_roues}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Nombre de casque </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$vehicule->nombre_casques}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Marque </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$vehicule->marque}}</div>
                                                </div>
                                                @endif
                                                @if($annonce->type_vehicule=="velo")
                                                <div class="row">
                                                    <div class="col-md-5">Marque </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$vehicule->marque}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">Taille </div>
                                                    <div class="col-md-1">:</div>
                                                    <div class="col md-6">{{$vehicule->taille}}</div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6  mt-2">
                                        <a class="btn btn-warning" href="{{ url('/demande/accept/'.$id_demande.'/'.$id_annonce) }}">
                                            Accepter
                                        </a>
                                    </div>
                                    <div class="col-md-6  mt-2">
                                        <a class="btn btn-primary float-left" href="{{ url('/demande/refuse/' . $id_demande) }}">
                                            Refuser
                                        </a>
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
</div>
<script>
    $('#bologna-list a').on('click', function(e) {
        e.preventDefault()
        $(this).tab('show')
    });

    $(window).on("load", function() {
        var nslide = $(".img0").data("slide-to");
        console.log(nslide);
        if (nslide == 0)
            $(".img0").addClass("active");
    });
</script>
@endsection