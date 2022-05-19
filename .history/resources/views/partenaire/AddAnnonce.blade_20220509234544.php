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
                                        <h2 class="fs-title">Les information de Véhicule</h2>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="typevVehicule">Type de véhicule</label>
                                                <select id="voiture" class="form-control" name="typeAnnonce">
                                                    <option value="voiture">Voiture</option>
                                                    <option value="moto">Moto</option>
                                                    <option value="velo">Vélo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="text-right" style='display:none;' id='NomS'><label for="NomS">Nom de la société</label>
                                                    <input type='text' class='form-control' name='NomSos' value size='20' />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-right" style='display:none;' id='AddS'><label for="AddS">adresse de la société</label>
                                                    <input type='text' class='form-control' name='AddSos' value size='20' />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="typevVehicule">Type de véhicule</label>
                                        <select id="voiture" class="form-control" name="typeAnnonce">
                                            <option value="voiture">Voiture</option>
                                            <option value="moto">Moto</option>
                                            <option value="velo">Vélo</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">

                                    </div>

                        </div>
                        <input type="button" name="next" class="next action-button" value="Next Step" />
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
    $('#voiture').on('change', function() {
        if (this.value === 'premium') {
            $("#dureePremium").show();
        } else {
            $("#dureePremium").hide();
        }
    });
</script>
@endsection