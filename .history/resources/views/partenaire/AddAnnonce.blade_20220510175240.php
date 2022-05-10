@extends('layouts.app')
@section('head')
<link href="{{ asset('css/AddAnnonceStyle.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('js/AddAnnonceStyle.js') }}"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

@endsection
@section('content')
<div class="card-body text-right">
    <!-- MultiStep Form -->
    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    @if($etat_annonce=="nonRemplie")
                    <h2><strong>Créer votre propre annonce</strong></h2>
                    <p>Renseigner tous les champs pour passer à l'étape suivante</p>
                    @else
                    <h2><strong>Votre annonce a été enregistrée</strong></h2>
                    <p>Vous serez contactés par les clients interérésses par l'annonce</p>
                    @endif
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform" action="{{route('annonce.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- progressbar -->
                                @if($etat_annonce=="nonRemplie")
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Véhicule</strong></li>
                                    <li id="personal"><strong>Annonce</strong></li>
                                    <li id="payment"><strong>Description</strong></li>
                                </ul>
                                @else
                                <ul id="finishedProgressBar">
                                    <li class="active"><strong>Véhicule</strong></li>
                                    <li class="active"><strong>Annonce</strong></li>
                                    <li class="active"><strong>Description</strong></li>
                                    <li class="active"><strong>Annonce suvegardée</strong></li>
                                </ul>
                                @endif
                                @if($etat_annonce=="nonRemplie")
                                <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Les informations de Véhicule</h2>
                                        <div class="row mb-4 ">
                                            <div class="col-md-6">
                                                <label for="typeVehicule">Type de véhicule</label>
                                                <select id="vehicule" class="form-control" name="typeVehicule">
                                                    <option selected>choisir un type</option>
                                                    <option value="voiture">Voiture</option>
                                                    <option value="moto">Moto</option>
                                                    <option value="velo">Vélo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style='display:none;' id='marque'>
                                                <label for="marque">Marque</label>
                                                <input type='text' class='form-control' name='marque' />
                                            </div>
                                            <div class="col-md-6" style='display:none;' id='modele'>
                                                <label for="modele">Modèle</label>
                                                <input type='text' class='form-control' name='modele' />
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style='display:none;' id='modeleAnnee'>
                                                <label for="modeleAnnee">Année du modèle</label>
                                                <input type='text' class='form-control' name='modelAnnee' />
                                            </div>
                                            <div class="col-md-6" style='display:none;' id="typeCarburant">
                                                <label for="typeCarburant">Type de carburant</label>
                                                <select class="form-control" name="typeCarburant">
                                                    <option value="diesel">Diesel</option>
                                                    <option value="essence">Essence</option>
                                                    <option value="hybride">Hybride</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style='display:none;' id='puissance'>
                                                <label for="puissance">Puissance fiscale</label>
                                                <input type='text' class='form-control' name='puissance' />
                                            </div>
                                            <div class="col-md-6" style='display:none;' id="nbrplace">
                                                <label for="nbr">Nombre de place</label>
                                                <select class="form-control" name="nbrplace">
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="2">2</option>
                                                    <option value="6">6</option>
                                                    <option value="2">2</option>
                                                    <option value="7">7</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style='display:none;' id='marqueMoto'>
                                                <label for="marqueMoto">Marque</label>
                                                <input type='text' class='form-control' name='marqueMoto' />
                                            </div>
                                            <div class="col-md-6" style='display:none;' id='modeleMoto'>
                                                <label for="modeleMoto">Modèle</label>
                                                <input type='text' class='form-control' name='modeleMoto' />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style='display:none;' id='anneeMoto'>
                                                <label for="anneeMoto">Année du modèle</label>
                                                <input type='text' class='form-control' name='anneeMoto' />
                                            </div>
                                            <div class="col-md-6" style='display:none;' id='cylindreeMoto'>
                                                <label for="cylindreeMoto">Cylindrée</label>
                                                <input type='text' class='form-control' name='cylindreeMoto' />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style='display:none;' id='nbrRoues'>
                                                <label for="nbrRoues">Nombre de roues</label>
                                                <select class="form-control" name="nbrRoues">
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6" style='display:none;' id='nbrCasque'>
                                                <label for="nbrCasque">Nombre de casque</label>
                                                <select class="form-control" name="nbrCasque">
                                                    <option value="2">1</option>
                                                    <option value="3">2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style='display:none;' id='marqueVelo'>
                                                <label for="marqueVelo">Marque</label>
                                                <input type='text' class='form-control' name='marqueVelo' />
                                            </div>
                                            <div class="col-md-6" style='display:none;' id='tailleVelo'>
                                                <label for="tailleVelo">Taille</label>
                                                <select class="form-control" name="tailleVelo">
                                                    <option value="2">14</option>
                                                    <option value="3">16</option>
                                                    <option value="2">18</option>
                                                    <option value="3">20</option>
                                                    <option value="3">22</option>
                                                    <option value="3">24</option>
                                                    <option value="3">26</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="suivant" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Information de l'annonce</h2>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="prix">Prix par jour</label>
                                                <input type='text' class='form-control' name='prix' pattern="^[0-9]+\.?[0-9]{0,2}$" placeholder=".00" />
                                            </div>
                                            <div class="col-md-2">
                                                <label for="prix">&nbsp;</label>
                                                <input type='' class='form-control' placeholder="DH" readonly />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="date">Date de disponibilité</label>
                                                <input type='date' class='form-control' name='date' />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="ville">Ville</label>
                                                <!--<select class="list-dt" name="ville">-->
                                                <select class="form-control" name="ville">
                                                    <option selected>Ville</option class="form-control">
                                                    <option value="Tétouan">Tétouan</option>
                                                    <option value="Tanger">Tanger</option>
                                                    <option value="Casablanca">Casablanca</option>
                                                    <option value="Rabat">Rabat</option>
                                                    <option value="Meknès">Meknès</option>
                                                    <option value="Fès">Fès</option>
                                                    <option value="Agadir">Agadir</option>
                                                    <option value="Marrakech">Marrakech</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="typeAnnonce">Type d'annonce</label>
                                                <select id="purpose" class="form-control" name="typeAnnonce">
                                                    <option value="non">Normale</option>
                                                    <option value="oui">Premium</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-6" style='display:none;' id='dureePremium'>
                                                <label>Durée premium</label>
                                                <select id="purpose" class="form-control" name="dureePremium">
                                                    <option value="mois">Mois</option>
                                                    <option value="semaine">Semaine</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="précédent" />
                                    <input type="button" name="next" class="next action-button" value="suivant" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Détails de l'annonce</h2>
                                        <div class="row">
                                            <label for="prix">Titre de l'annonce</label>
                                            <input type='text' class='form-control' name='titre' />
                                        </div>
                                        <div class="row">
                                            <label for="prix">Images pour l'objet</label>

                                            <input type="file" name="images[]" value="" multiple />
                                        </div>
                                        <div class="row">
                                            <label for="date">Description de l'annonce</label>
                                            <textarea class='form-control' name='description'></textarea>
                                        </div>

                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="précédent" />
                                    <input type="submit" name="make_payment" class="next action-button" value="Confirmer" />
                                </fieldset>
                                @else
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Success !</h2>
                                        <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-3">
                                                <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image">
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5>You Have Successfully Signed Up</h5>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                @endif

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#purpose').on('change', function() {
        if (this.value === 'oui') {
            $("#dureePremium").show();
        } else {
            $("#dureePremium").hide();
        }
    });
    $('#vehicule').on('change', function() {
        if (this.value === 'voiture') {
            $("#marque").show();
            $("#modele").show();
            $("#modeleAnnee").show();
            $("#typeCarburant").show();
            $("#puissance").show();
            $("#nbrplace").show();
            $("#suivant").show();



        } else {
            $("#marque").hide();
            $("#modele").hide();
            $("#modeleAnnee").hide();
            $("#typeCarburant").hide();
            $("#puissance").hide();
            $("#nbrplace").hide();
            $("#suivant").hide();

        }
    });
    $('#vehicule').on('change', function() {
        if (this.value === 'moto') {
            $("#modeleMoto").show();
            $("#anneeMoto").show();
            $("#marqueMoto").show();
            $("#cylindreeMoto").show();
            $("#nbrRoues").show();
            $("#nbrCasque").show();
            $("#suivant").show();


        } else {
            $("#modeleMoto").hide();
            $("#anneeMoto").hide();
            $("#marqueMoto").hide();
            $("#cylindreeMoto").hide();
            $("#nbrRoues").hide();
            $("#nbrCasque").hide();
            $("#suivant").hide();


        }
    });
    $('#vehicule').on('change', function() {
        if (this.value === 'velo') {
            $("#marqueVelo").show();
            $("#tailleVelo").show();


        } else {
            $("#marqueVelo").hide();
            $("#tailleVelo").hide();



        }
    });
</script>
@endsection