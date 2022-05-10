@extends('layouts.app')
@section('head')
<link href="{{ asset('css/AddAnnonceStyle.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('js/AddAnnonceStyle.js') }}"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

@endsection
@section('content')
<div class="card-body text-right">
    <!-- <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="titre">Titre d'annonce</label>
                                <input type="text" class="form-control" name="titre">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date_dispo">Date de disponibilité</label>
                                <input type="date" class="form-control" name="date_dispo">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="prix">Prix par jour</label>
                                <input type="text" class="form-control" name="prix">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ville">Ville</label>
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
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="typeAnnonce">Type d'annonce</label>
                                <select id="purpose" class="form-control" name="typeAnnonce">
                                    <option value="normale">Normale</option>
                                    <option value="premium">Premium</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6" style='display:none;' id='dureePremium'>
                                <label for="NomS">Durée premium</label>
                                <input type='text' class='form-control' name='duree' />
                            </div>
                        </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Check me out
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
                </form> -->
    <!-- MultiStep Form -->
    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>Sign Up Your User Account</strong></h2>
                    <p>Fill all form field to go to next step</p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform">
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
                                        <div>
                                            <div class="row mb-4 ">
                                                <div class="col-md-6">
                                                    <label for="typeVehicule">Type de véhicule</label>
                                                    <select id="vehicule" class="form-control" name="typeAnnonce">
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
                                        </div>
                                        <div>
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
                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Next Step" />
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Personal Information</h2>
                                        <input type="text" name="fname" placeholder="First Name" />
                                        <input type="text" name="lname" placeholder="Last Name" />
                                        <input type="text" name="phno" placeholder="Contact No." />
                                        <input type="text" name="phno_2" placeholder="Alternate Contact No." />
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    <input type="button" name="next" class="next action-button" value="Next Step" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Payment Information</h2>
                                        <div class="radio-group">
                                            <div class='radio' data-value="credit"><img src="https://i.imgur.com/XzOzVHZ.jpg" width="200px" height="100px"></div>
                                            <div class='radio' data-value="paypal"><img src="https://i.imgur.com/jXjwZlj.jpg" width="200px" height="100px"></div>
                                            <br>
                                        </div>
                                        <label class="pay">Card Holder Name*</label>
                                        <input type="text" name="holdername" placeholder="" />
                                        <div class="row">
                                            <div class="col-9">
                                                <label class="pay">Card Number*</label>
                                                <input type="text" name="cardno" placeholder="" />
                                            </div>
                                            <div class="col-3">
                                                <label class="pay">CVC*</label>
                                                <input type="password" name="cvcpwd" placeholder="***" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <label class="pay">Expiry Date*</label>
                                            </div>
                                            <div class="col-9">
                                                <select class="list-dt" id="month" name="expmonth">
                                                    <option selected>Month</option>
                                                    <option>January</option>
                                                    <option>February</option>
                                                    <option>March</option>
                                                    <option>April</option>
                                                    <option>May</option>
                                                    <option>June</option>
                                                    <option>July</option>
                                                    <option>August</option>
                                                    <option>September</option>
                                                    <option>October</option>
                                                    <option>November</option>
                                                    <option>December</option>
                                                </select>
                                                <select class="list-dt" id="year" name="expyear">
                                                    <option selected>Year</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    <input type="button" name="make_payment" class="next action-button" value="Confirm" />
                                </fieldset>
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
        if (this.value === 'premium') {
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
            $("#next").show();



        } else {
            $("#marque").hide();
            $("#modele").hide();
            $("#modeleAnnee").hide();
            $("#typeCarburant").hide();
            $("#puissance").hide();
            $("#nbrplace").hide();
            $("#next").hide();

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
            $("#next").show();

        } else {
            $("#modeleMoto").hide();
            $("#anneeMoto").hide();
            $("#marqueMoto").hide();
            $("#cylindreeMoto").hide();
            $("#nbrRoues").hide();
            $("#nbrCasque").hide();
            $("#next").hide();

        }
    });
</script>
@endsection