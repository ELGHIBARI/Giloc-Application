@extends('layouts.app')
@section('head')
<link href="{{ asset('css/AddAnnonceStyle.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('js/AddAnnonceStyle.js') }}"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet"/>
@endsection
@section('content')
<div class="card-body text-right">
    <!-- MultiStep Form -->
    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>Confirmer votre réservation</strong></h2>
                    <p>Renseigner tous les champs pour passer à l'étape suivante</p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form method="POST" action="{{ route('reservation.store') }}" id="msform" enctype="multipart/form-data">
                                @csrf
                                <!-- progressbar -->
                                <input type="hidden" name="id_annonce" value="{{ $id }}">
                                <input type="hidden" name="id_client" value="{{ $id_c }}">

                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Durrée</strong></li>
                                    <li id="personal"><strong>Prix</strong></li>
                                    <li id="payment"><strong>récap</strong></li>
                                </ul>
                                <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card">
                                        <h3 class="fs-title">Date début :@php if($date_debut > date('Y-m-d')){
                                            $date_debut_valide = $date_debut;  
                                        }
                                        else {$date_debut_valide = date('Y-m-d');}
                                        @endphp</h3>  
                                        
                                        <input type='date' id="date_debut" class='form-control' min="{{ $date_debut_valide }}" max="{{ $date_fin }}" name='date_debut' />
                                        <br>
                                        <h3 class="fs-title">Date Fin</h3>
                                        <input type='date' id="date_fin" class='form-control' min="{{ $date_debut_valide  }}" max="{{ $date_fin }}" name='date_fin' />
                                    </div>
                                    <input type="button" name="next" id="next1" class="next action-button" value="suivant" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Prix total de location</h2>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="prix">nombre de jour</label>
                                              
                                                <input type='text' id="days" value="<script>document.write(days)</script>" class='form-control' name='nb_jour' disabled />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <label for="prix">Prix par jour</label>
                                                <input type='text' id="prix_par_jour" class='form-control' name='prix_par_jour' value="{{ $prix }}"  readonly/>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="prix">&nbsp;</label>
                                                <input type='' class='form-control' placeholder="MAD" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <label for="prix">Prix total</label>
                                               {{-- @php
                                                $prix_total =";"
                                                @endphp --}}
                                                <input type='text' id="prix_total" class='form-control' name="prix_total" value="<script>document.write(prix_total)</script>" readonly />
                                            </div>
                                            <div class="col-md-2">
                                                <label for="prix">&nbsp;</label>
                                                <input type='' class='form-control' placeholder="MAD" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <input type="button" name="previous" class="previous action-button-previous" value="précédent" />
                                    <input type="button" name="next" id="next2" class="next action-button" value="suivant" /> --}}
                                    <input type="submit" id="next3" name="annuler_payment" id="next3" class="next action-button" value="Annuler" />
                                    <input type="submit" id="next3" name="make_payment" id="next3" class="next action-button" value="Confirmer" />
                                </fieldset>
                                {{-- <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Détails de l'annonce</h2>
                                        <div class="row">
                                            <label for="prix">Titre de l'annonce</label>
                                            <input  id="intitre" type='text' class='form-control' name='titre' required/>
                                        </div>
                                        <div class="row">
                                            <label for="prix">Images pour l'objet</label>

                                            <input   id="inimage" type="file" name="images[]" value="" multiple   required/>
                                        </div>
                                        <div class="row">
                                            <label for="date">Description de l'annonce</label>
                                            <textarea  class='form-control' name='description' required></textarea>
                                        </div>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous" value="précédent" />
                                    <input type="submit" id="next3" name="make_payment" id="next3" class="next action-button" value="Confirmer" />
                                </fieldset> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#next1').click(function(){
        var date_debut= $('#date_debut').val();
        var date_fin = $('#date_fin').val();
        var difference = new Date(date_fin.replace(/-/g, "/")).getTime()- new Date(date_debut.replace(/-/g, "/")).getTime();
        var days = Math.ceil(difference / (1000 * 3600 * 24));
        //alert(days + ' days to Christmas');
        document.getElementById("days").value = days;
        var prix_par_jour = document.getElementById("prix_par_jour").value;
        var prix_total = days*prix_par_jour;
        // $('#prix_total').val("prix_total");
        //document.getElementById("prix_total").setAttribute('value','prix_total');
        document.getElementById("prix_total").value = prix_total;   

        var _velo = $('#inMarVelo').val();
            if (date_debut.length == 0  || date_fin.length == 0) {
                alert("Merci de renseigner tous les champs");
                document.getElementById("nex1").disabled = true;
            } else if(date_debut >= date_fin) {
                alert("Merci d'entrer une date valide");
                document.getElementById("nex1").disabled = true;
            }
    });
</script>
@endsection