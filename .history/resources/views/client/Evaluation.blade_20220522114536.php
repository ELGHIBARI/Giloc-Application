@extends('layouts.app')
@section('head')
<link href="{{ asset('css/EvaluationList.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
@endsection
@section('content')
<div class="container w-100 ">
    <div class="row  justify-content-center">
        <div class=" mt-2 col-md-10">
            <div class="card">
                <div class="card-header text-right mytable" id="btn-1" style="background-color:cornsilk">Evaluer</div>

                <div class="card-body text-right " id="tb-1" style="display: none;">
                    <div style="overflow-x:auto;">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">Titre de l'annonce</th>
                                    <th scope="col">Nom de partenaire</th>
                                    <th scope="col">Evaluation</th>
                                    <th scope="col">Type de commentaire</th>
                                    <th scope="col">Commentaire</th>
                                    <th scope="col">Action</th>

                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($rating_objet as $rate)
                                @if ($rate['etat'] == 0)
                                <tr class='clickable-row'>
                                    <td>{{ $rate['annonce']['titre'] }}</td>
                                    <td>{{ $rate['user']['nom_complet'] }}</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>
                                        <!-- Trigger/Open The Modal -->
                                        <button class="btn btn-primary " id="myBtn">Evaluer</button>

                                        <!-- The Modal -->
                                        <div id="myModal" class="modal">
                                            <!-- Modal content -->
                                            <form method="POST" action="{{ url('evaluer_objet_partenaire/' . $rate['annonce_id']) }}">
                                                @csrf
                                                <div class="modal-content w-50" id="mod_content_objet">
                                                    <span class="close">&times;</span>
                                                    <h3 class="text-center">Evaluer l'objet</h3>
                                                    <div class="row">
                                                        <div class="col-md-12 d-flex border-top justify-content-center">

                                                            <div class="rating_objet w-50">

                                                                <input type="radio" name="rating_objet" class="input1" value="5" id="55"><label for="55">☆</label>
                                                                <input type="radio" name="rating_objet" class="input1" value="4" id="44"><label for="44">☆</label>
                                                                <input type="radio" name="rating_objet" class="input1" value="3" id="33"><label for="33">☆</label>
                                                                <input type="radio" name="rating_objet" class="input1" value="2" id="22"><label for="22">☆</label>
                                                                <input type="radio" name="rating_objet" class="input1" value="1" id="11"><label for="11">☆</label>
                                                            </div>
                                                        </div>
                                                        <!-- ajouter commentaire -->
                                                        <div class="form-check mb-1  form-switch mr-4">
                                                            <input class="form-check-input" name="existe_com_objet" type="checkbox" id="ajouter_com_objet">
                                                            <label class="form-check-label  mr-2" for="flexSwitchCheckChecked">Ajouter
                                                                Commentaire</label>
                                                        </div>
                                                        <!-- div de commentaire -->
                                                        <div class="col-md-12 border-top" name="commentaire_objet" id="commentaire_objet" style="display: none;">
                                                            <!-- type -->
                                                            <div class="col-md-12  mt-2 d-flex  ">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="type_commentaire_objet" value="positif" id="flexRadioDefault1" checked>
                                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                                        Commentaire positif
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="type_commentaire_objet" value="negatif" id="flexRadioDefault2">
                                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                                        Commentaire negatif
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <!-- text area  -->
                                                            <div class="col-md-12  d-flex  ">
                                                                <div class="w-100 mt-2" id="commentaire_objet">
                                                                    <div class="form-floating">
                                                                        <textarea class="form-control" name="commentaire_objet" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">...</textarea>
                                                                        <label for="floatingTextarea2">Commentaire...</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-content w-50" style="margin-top:-6px; border-top:none;" id="mod_content_partenaire">
                                                    <h3 class="text-center">Evaluer le Partenaire
                                                    </h3>
                                                    <div class="row">
                                                        <div class="col-md-12 d-flex border-top justify-content-center">
                                                            <div class="rating_partenaire w-50">
                                                                <input type="radio" name="rating_partenaire" class="input2" value="5" id="5"><label for="5">☆</label>
                                                                <input type="radio" name="rating_partenaire" class="input2" value="4" id="4"><label for="4">☆</label>
                                                                <input type="radio" name="rating_partenaire" class="input2" value="3" id="3"><label for="3">☆</label>
                                                                <input type="radio" name="rating_partenaire" class="input2" value="2" id="2"><label for="2">☆</label>
                                                                <input type="radio" name="rating_partenaire" class="input2" value="1" id="1"><label for="1">☆</label>
                                                            </div>
                                                        </div>
                                                        <!-- ajouter commentaire -->
                                                        <div class="form-check mb-1  form-switch mr-4">
                                                            <input class="form-check-input" name="existe_com_partenaire" type="checkbox" id="ajouter_com_partenaire">
                                                            <label class="form-check-label  mr-2" for="flexSwitchCheckChecked">Ajouter
                                                                Commentaire</label>
                                                        </div>
                                                        <!-- div de commentaire -->
                                                        <div class="col-md-12 border-top" name="commentaire_partenaire" id="commentaire_partenaire" style="display: none;">
                                                            <!-- type -->
                                                            <div class="col-md-12  mt-2 d-flex  ">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="type_commentaire_partenaire" value="positif" id="flexRadioDefault1" checked>
                                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                                        Commentaire positif
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="type_commentaire_partenaire" value="negatif" id="flexRadioDefault2">
                                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                                        Commentaire negatif
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <!-- text area  -->
                                                            <div class="col-md-12  d-flex  ">
                                                                <div class="w-100 mt-2" id="commentaire_partenaire">
                                                                    <div class="form-floating">
                                                                        <textarea class="form-control" name="commentaire_partenaire" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">...</textarea>
                                                                        <label for="floatingTextarea2">Commentaire...</label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary mr-3  mt-3" id="submit" style="display: none;" type="submit">Envoyer</button>
                                                </div>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @if ($rating_objet == null)
                                <tr class='clickable-row'>
                                    <td colspan="5">
                                        <center>vide</center>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class=" mt-2 col-md-10">
            <div class="card">
                <div class="card-header text-right mytable" id="btn-2" style="background-color:cornsilk">Evaluation objets</div>
                <div class="card-body text-right" id="tb-2" style="display: none;">
                    <div style="overflow-x:auto;">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">Titre de l'annonce</th>
                                    <th scope="col">Nom de partenaire</th>
                                    <th scope="col">Evaluation</th>
                                    <th scope="col">Type de commentaire</th>
                                    <th scope="col">Commentaire</th>
                                    <th scope="col">Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($rating_objet as $rate)

                                @if ($rate['etat'] == 2)
                                <tr class='clickable-row'>
                                    <td>{{ $rate['annonce']['titre'] }}</td>
                                    <td>{{ $rate['user']['nom_complet'] }}</td>
                                    <td>{{ $rate['evaluation_etoile'] }}/5</td>
                                    <td>{{ $rate['type_commentaire'] }}</td>
                                    <td>{{ $rate['commentaire'] }}</td>
                                    <td>-</td>
                                </tr>
                                @endif
                                @endforeach
                                @if ($rating_objet == null)
                                <tr class='clickable-row'>
                                    <td colspan="5">
                                        <center>vide</center>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class=" mt-2 col-md-10">
            <div class="card">
                <div class="card-header text-right mytable" id="btn-3" style="background-color:cornsilk">Evaluation Partenaire</div>
                <div class="card-body text-right " id="tb-3" style="display: none;">
                    <div style="overflow-x:auto;">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">Titre de l'annonce</th>
                                    <th scope="col">Nom de partenaire</th>
                                    <th scope="col">Evaluation</th>
                                    <th scope="col">Type de commentaire</th>
                                    <th scope="col">Commentaire</th>
                                    <th scope="col">Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($rating_partenaire as $rate)

                                @if ($rate['etat'] == 2)
                                <tr class='clickable-row'>
                                    <td>{{ $rate['annonce']['titre'] }}</td>
                                    <td>{{ $rate['partenaire']['nom_complet'] }}</td>
                                    <td>{{ $rate['evaluation_etoile'] }}/5</td>
                                    <td>{{ $rate['type_commentaire'] }}</td>
                                    <td>{{ $rate['commentaire'] }}</td>
                                    <td>-</td>
                                </tr>
                                @endif
                                @endforeach
                                @if ($rating_objet == null)
                                <tr class='clickable-row'>
                                    <td colspan="5">
                                        <center>vide</center>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10 mt-3">
            <div class="card">
                <div class="card-header text-right mytable" id="btn-4" style="background-color:cornsilk">{{ __('La liste des evaluations de vous') }}</div>

                <div class="card-body text-right" id="tb-4" style="display: none;">
                    <div style="overflow-x:auto;">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">Nom de Partenaire</th>
                                    <th scope="col">Evaluation</th>
                                    <th scope="col">Type de commentaire</th>
                                    <th scope="col">Commentaire</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($rating_client as $rate)
                                <tr class='clickable-row'>
                                    <td>{{ $rate['partenaire']['nom_complet'] }}</td>
                                    <td>{{ $rate['evaluation_etoile'] }}/5</td>
                                    <td>{{ $rate['type_commentaire'] }}</td>
                                    <td>{{ $rate['commentaire'] }}</td>
                                </tr>
                                @endforeach
                                @if ($rating_client == null)
                                <tr class='clickable-row'>
                                    <td colspan="5">
                                        <center>vide</center>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        $("#myBtn").click(function() {
            $("#myModal").show();

        });
        $(".close").click(function() {
            $("#myModal").hide();

        })
        //require
        var b1 = 0,
            b2 = 0;
        $("#1,#2,#3,#4,#5").change(function() {
            b1 = 1;
            if (b2 == 1)
                $("#submit").toggle();

        });
        $("#11,#22,#33,#44,#55").change(function() {
            b2 = 1;
            if (b1 == 1)
                $("#submit").toggle();

        });

        $("#ajouter_com_objet").click(function() {


            $('#commentaire_objet').toggle();
            $("#mod_content_objet").toggleClass('ajout_com');

        });
        $("#ajouter_com_partenaire").click(function() {


            $('#commentaire_partenaire').toggle();
            $("#mod_content_partenaire").toggleClass('ajout_com');

        });



        $("#btn-1").click(function() {


            $('#tb-1').toggle();
            $("#btn-1").toggleClass('choixi');
            $("#tb-2").hide();
            $("#tb-3").hide();
            $("#tb-4").hide();
            $("#btn-2").removeClass('choixi');
            $("#btn-3").removeClass('choixi');
            $("#btn-4").removeClass('choixi');

        });
        $("#btn-2").click(function() {


            $('#tb-2').toggle();
            $("#btn-2").toggleClass('choixi');
            $("#tb-1").hide();
            $("#tb-3").hide();
            $("#tb-4").hide();
            $("#btn-1").removeClass('choixi');
            $("#btn-3").removeClass('choixi');
            $("#btn-4").removeClass('choixi');

        });
        $("#btn-3").click(function() {


            $('#tb-3').toggle();
            $("#btn-3").toggleClass('choixi');
            $("#tb-2").hide();
            $("#tb-1").hide();
            $("#tb-4").hide();
            $("#btn-1").removeClass('choixi');
            $("#btn-2").removeClass('choixi');
            $("#btn-4").removeClass('choixi');
        });
        $("#btn-4").click(function() {


            $('#tb-4').toggle();
            $("#btn-4").toggleClass('choixi');
            $("#tb-2").hide();
            $("#tb-3").hide();
            $("#tb-1").hide();
            $("#btn-1").removeClass('choixi');
            $("#btn-3").removeClass('choixi');
            $("#btn-2").removeClass('choixi');
        });



    });
</script>
@endsection