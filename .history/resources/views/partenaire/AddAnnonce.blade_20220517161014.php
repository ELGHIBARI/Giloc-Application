@extends('layouts.app')
@section('head')
<link href="{{ asset('css/AddAnnonceStyle.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('js/AddAnnonceStyle.js') }}"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">
@endsection
@section('content')
@if($ok==1)
<div class="card-body text-right">
    <!-- MultiStep Form -->
    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>Créer votre annonce</strong></h2>
                    <p>Renseigner tous les champs pour passer à l'étape suivante</p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form method="POST" action="{{url('annonce/store')}}" id="msform" enctype="multipart/form-data">
                                @csrf
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Véhicule</strong></li>
                                    <li id="personal"><strong>Annonce</strong></li>
                                    <li id="payment"><strong>Description</strong></li>
                                </ul>
                                <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Les informations de Véhicule</h2>
                                        <div class="row mb-4 ">
                                            <div class="col-md-6">
                                                <label for="typeVehicule">Type de véhicule</label>
                                                <select id="vehicule" class="form-control" name="typeVehicule" id="inTypeV" required>
                                                    <option selected disabled>choisir un type</option>
                                                    <option value="voiture">Voiture</option>
                                                    <option value="moto">Moto</option>
                                                    <option value="velo">Vélo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 field" style='display:none;' id='marque'>
                                                <label for="marque">Marque</label>
                                                <input id="inMarque" type='text' class='form-control ' name='marque' />
                                            </div>
                                            <div class="col-md-6 field" style='display:none;' id='modele'>
                                                <label for="modele">Modèle</label>
                                                <input id="inModele" type='text' class='form-control ' name='modele' />
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style='display:none;' id='modeleAnnee'>
                                                <label for="modeleAnnee">Année du modèle</label>
                                                <input id="inAnnee" type='number' class='form-control' min="1900" max="{{ now()->year }}" name='modelAnnee' />
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
                                                <input id="inPF" type='text' class='form-control' name='puissance' />
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
                                                <input id="inMarMoto" type='text' class='form-control' name='marqueMoto' />
                                            </div>
                                            <div class="col-md-6" style='display:none;' id='modeleMoto'>
                                                <label for="modeleMoto">Modèle</label>
                                                <input id="inModMoto" type='text' class='form-control' name='modeleMoto' />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style='display:none;' id='anneeMoto'>
                                                <label for="anneeMoto">Année du modèle</label>
                                                <input id="inAnneeMoto" type='number' class='form-control' name='anneeMoto' min="1900" max="{{ now()->year }}" />
                                            </div>
                                            <div class="col-md-6" style='display:none;' id='cylindreeMoto'>
                                                <label for="cylindreeMoto">Cylindrée</label>
                                                <input id="incyl" type='text' class='form-control' name='cylindreeMoto' />
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
                                                <input type='text' id="inMarVelo" class='form-control' name='marqueVelo' />
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
                                    <input type="button" name="next" id="next1" class="next action-button" value="suivant" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Information de l'annonce</h2>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="prix">Prix par jour</label>
                                                <input type='number' id="inprix" class='form-control' name='prix' step="0.5" />
                                            </div>
                                            <div class="col-md-2">
                                                <label for="prix">&nbsp;</label>
                                                <input type='' class='form-control' placeholder="MAD" readonly />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="date">Date de disponibilité</label>
                                                <input type='date' id="indate" class='form-control' name='date' />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="ville">Ville</label>
                                                <!--<select class="list-dt" name="ville">-->
                                                <select class="form-control" name="ville">
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
                                                    <option value="7 jours">7 jours</option>
                                                    <option value="15 jours">15 jours</option>
                                                    <option value="30 jours">30 jours</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="précédent" />
                                    <input type="button" name="next" id="next2" class="next action-button" value="suivant" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Détails de l'annonce</h2>
                                        <div class="row">
                                            <label for="prix">Titre de l'annonce</label>
                                            <input id="intitre" type='text' class='form-control' name='titre' required />
                                        </div>
                                        <div class="row">
                                            <label for="prix">Images pour l'objet</label>

                                            <input id="inimage" type="file" name="images[]" value="" multiple required />
                                        </div>
                                        <div class="row">
                                            <label for="date">Description de l'annonce</label>
                                            <textarea class='form-control' name='description' required></textarea>
                                        </div>

                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="précédent" />
                                    <input type="submit" id="next3" name="make_payment" id="next3" class="next action-button" value="Confirmer" />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<p>jjjjjjjjjjjjjjjjjj</p>
@php
echo '<script>';
echo 'alert("vous avez un maximum de cinq annonce")';
echo 'window.location= "url(/home)"';
echo '</script>';
@endphp
@endif
<script>
    var choix;
    var Type_Annonce;
    $('#purpose').on('change', function() {
        if (this.value === 'oui') {
            $("#dureePremium").show();
            Type_Annonce = "premium";
        } else {
            $("#dureePremium").hide();
            Type_Annonce = "normale";

        }
    });
    $('#vehicule').on('change', function() {
        if (this.value === 'voiture') {
            choix = 'voiture';
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
            choix = 'moto';
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
            choix = 'velo';
            $("#marqueVelo").show();
            $("#tailleVelo").show();


        } else {
            $("#marqueVelo").hide();
            $("#tailleVelo").hide();



        }
    });
    $('#next1').click(function() {
        var form = $('#msform').serialize();
        if (choix === 'velo') {
            var marque_velo = $('#inMarVelo').val();
            if (marque_velo.length == 0) {
                alert("Merci de renseigner tous les champs");
                document.getElementById("nex1").disabled = true;
            }


        } else if (choix === 'voiture') {
            var marque_voiture = $('#inMarque').val();
            var modele_voiture = $('#inModele').val();
            var annee_voiture = $('#inAnnee').val();
            var puissance_voiture = $('#inPF').val();
            if (marque_voiture.length == 0 || modele_voiture.length == 0 || annee_voiture.length == 0 || puissance_voiture.length == 0) {
                alert("Merci de renseigner tous les champs");
                document.getElementById("nex1").disabled = true;

            }
        } else if (choix === 'moto') {
            var marque_moto = $('#inMarMoto').val();
            var modele_moto = $('#inModMoto').val();
            var annee_moto = $('#inAnneeMoto').val();
            var cylindreeMoto = $('#incyl').val();
            if (marque_moto.length == 0 || modele_moto.length == 0 || annee_moto.length == 0 || cylindreeMoto.length == 0) {
                alert("Merci de renseigner tous les champs");
                document.getElementById("nex1").disabled = true;

            }
        } else {
            alert("le choix de type de véhicule est invalide");
            document.getElementById("nex1").disabled = true;

        }

    });
    $('#next2').click(function() {
        var form = $('#msform').serialize();
        var prix = $('#inprix').val();
        var date = $('#indate').val();
        if (date.length == 0) {
            alert('merci de saisir une date valide');
            document.getElementById("nex2").disabled = true;
        }
        if (prix.lenght == 0 || prix <= 0) {
            alert('format de prix est incorrect');
            document.getElementById("nex2").disabled = true;
        }
    });
    $('#next3').click(function() {
        var form = $('#msform').serialize();
        var titre = $('#intitre').val();
        var image = $('#inimage').val();
        var desc = $('#indescription').val();
        if (image.length == 0 || titre.length == 0 || desc.length == 0) {
            alert('merci de saisir tous les champs');
            document.getElementById("nex3").disabled = true;
        }
    });
</script>
@endsection