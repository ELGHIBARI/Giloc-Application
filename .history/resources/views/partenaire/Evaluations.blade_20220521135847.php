@extends('layouts.app')
@section('head')
<link href="{{ asset('css/EvaluationList.css') }}" rel="stylesheet">
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
                                    <th scope="col">Nom de client</th>
                                    <th scope="col">Evaluation</th>
                                    <th scope="col">Type de commentaire</th>
                                    <th scope="col">Commentaire</th>
                                    <th scope="col">Action</th>

                                </tr>

                            </thead>
                            <tbody>
                                @foreach($rating_client as $rate)
                                @if($rate['etat']==0)
                                <tr class='clickable-row'>
                                    <td>{{$rate['client']['nom_complet']}}</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>
                                        <!-- Trigger/Open The Modal -->
                                        <button class="btn btn-primary " id="myBtn">Evaluer</button>

                                        <!-- The Modal -->
                                        <div id="myModal" class="modal">
                                            <!-- Modal content -->
                                            <div class="modal-content w-50" id="mod_content">
                                                <span class="close">&times;</span>
                                                <h3 class="text-center">Evaluer le client {{$rate['client']['nom_complet']}}</h3>
                                                <form method="POST" action="{{ url('evaluer/'.$rate['id']) }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12 d-flex border-top justify-content-center">

                                                            <div class="rating w-50">

                                                                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                                                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                                                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                                                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                                                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                                            </div>
                                                        </div>
                                                        <!-- ajouter commentaire -->
                                                        <div class="form-check mb-1  form-switch mr-4">
                                                            <input class="form-check-input" name="existe_com" type="checkbox" id="ajouter_com">
                                                            <label class="form-check-label  mr-2" for="flexSwitchCheckChecked">Ajouter Commentaire</label>
                                                        </div>
                                                        <!-- div de commentaire -->
                                                        <div class="col-md-12 border-top" name="commentaire" id="commentaire" style="display: none;">
                                                            <!-- type -->
                                                            <div class="col-md-12  mt-2 d-flex  ">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="type_commentaire" value="positif" id="flexRadioDefault1" checked>
                                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                                        Commentaire positif
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="type_commentaire" value="negatif" id="flexRadioDefault2">
                                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                                        Commentaire negatif
                                                                    </label>
                                                                </div>

                                                            </div>
                                                            <!-- text area  -->
                                                            <div class="col-md-12  d-flex  ">
                                                                <div class="w-100 mt-2" id="commentaire">
                                                                    <div class="form-floating">
                                                                        <textarea class="form-control" name="commentaire" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" >...</textarea>
                                                                        <label for="floatingTextarea2">Commentaire...</label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <button class="btn btn-primary mr-3  mt-3" type="submit" style="display: none;" id="submit">Envoyer</button>

                                                </form>
                                            </div>

                                        </div>

                                    </td>
                                </tr>
                                @endif
                                @endforeach


                                @if($rating_client==null)
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
                <div class="card-header text-right mytable" id="btn-2" style="background-color:cornsilk">Historique de les evaluations clients</div>

                <div class="card-body text-right" id="tb-2" style="display: none;">
                    <div style="overflow-x:auto;">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">Nom de client</th>
                                    <th scope="col">Evaluation</th>
                                    <th scope="col">Type de commentaire</th>
                                    <th scope="col">Commentaire</th>
                                    <th scope="col">Action</th>

                                </tr>

                            </thead>
                            <tbody>
                                @foreach($rating_client as $rate)

                                @if($rate['etat']==1)
                                <tr class='clickable-row'>
                                    <td>{{$rate['client']['nom_complet']}}</td>
                                    <td>{{$rate['evaluation_etoile']}}/5</td>
                                    <td>{{$rate['type_commentaire']}}</td>
                                    <td>{{$rate['commentaire']}}</td>
                                    <td>-</td>
                                </tr>
                                @endif
                                @endforeach


                                @if($rating_client==null)
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
                <div class="card-header text-right mytable" id="btn-3" style="background-color:cornsilk">{{ __('Historique de les evaluations de votre objet') }}</div>

                <div class="card-body text-right" id="tb-3" style="display: none;">
                    <div style="overflow-x:auto;">
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col">Titre de l'annonce</th>
                                    <th scope="col">Nom de client</th>
                                    <th scope="col">Evaluation</th>
                                    <th scope="col">Type de commentaire</th>
                                    <th scope="col">Commentaire</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach($rating_objet as $rate)
                                @foreach($rate['evaluation'] as $e)
                                <tr class='clickable-row' ">
                                    <td>{{$rate['titre']}}</td>
                                    <td>{{$rate['user']['nom_complet']}}</td>
                                    <td>{{$e['evaluation_etoile']}}/5</td>
                                    <td>{{$e['type_commentaire']}}</td>
                                    <td>{{$e['commentaire']}}</td>
                                </tr>
                                @endforeach
                                @endforeach

                                @if($rating_objet==null)
                                <tr class='clickable-row'>
                                <td colspan=" 5">
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
                                    <th scope="col">Nom de client</th>
                                    <th scope="col">Evaluation</th>
                                    <th scope="col">Type de commentaire</th>
                                    <th scope="col">Commentaire</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach($rating_partenaire as $rate)
                                <tr class='clickable-row'>
                                    <td>{{$rate['client']['nom_complet']}}</td>
                                    <td>{{$rate['evaluation_etoile']}}/5</td>
                                    <td>{{$rate['type_commentaire']}}</td>
                                    <td>{{$rate['commentaire']}}</td>
                                </tr>
                                @endforeach
                                @if($rating_partenaire==null)
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
        $("#1,#2,#3,#4,#5").change(function() {
            $("#submit").show();

        });

        //--------------
        $("#ajouter_com").click(function() {


            $('#commentaire').toggle();
            $("#mod_content").toggleClass('ajout_com');

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