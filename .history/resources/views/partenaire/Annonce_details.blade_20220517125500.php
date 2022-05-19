@extends('layouts.app')
@section('head')
<link href="{{ asset('css/AnnonceDetailStyle.css') }}" rel="stylesheet">
<link href="{{ asset('css/MessagePanelStyle.css') }}" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
<style>
    .mytable thead:hover {
        /**   background-color: lightcyan*/
        background-color: #2c2b02;
        background-image: linear-gradient(120deg, #FFF8DC, #ffb700);
    }
</style>
@endsection


@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="col-xl-12 mr-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4 text-right">Demandes </h4>
                    @if($demandes!=null)
                    <ul class="list-unstyled activity-wid mb-0">
                        <a href="" style="color:black ; text-decoration: none;">
                            <li class="activity-list activity-border">

                                <div class="activity-icon avatar-sm">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="avatar-sm rounded-circle" alt="">
                                </div>
                                <div class="media">
                                    <div class="me-3">
                                        @foreach($demandes as $demande)
                                        <h4 class="font-size-15 mb-1 text-right">{{$demande->userDemande->nom_complet}}</h4>
                                        <p class="text-muted font-size-14 mb-0">{{$demande->userDemande->ville}}</p>
                                    </div>

                                    <div class="media-body">
                                        <div class="text-end d-none d-md-block">
                                            <p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="fa fa-calendar font-size-15 text-primary"></i>
                                                @php $date_envoi_dem = strtotime($demande->created_at);
                                                     $difference = time()-$date_envoi_dem;
                                                 @endphp
                                                 {{ round($difference / 86400) }} days
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                            </li>

                        </a>
                    </ul>
                    @endif
                    <h4 class="header-title mb-4 text-right">Messages </h4>
                    <ul class="list-unstyled activity-wid mb-0 ">
                        @foreach($conversations as $conversation)
                        <div style="overflow-x:auto;">
                            <table class="table mytable">
                                <thead class="clickable-row" data-id="{{$conversation->id}}" data-receiver="{{$conversation->client_id}}" style="background-color:cornsilk">
                                    <td>
                                        <li class="activity-list activity-border">
                                            <div class="activity-icon avatar-sm">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="avatar-sm rounded-circle" alt="">
                                            </div>
                                            <div class="media">
                                                <div class="me-3">
                                                    <h5 class="font-size-15 mb-1 text-right">{{$conversation->userConversation->nom_complet}}</h5>
                                                    @foreach($lastMessages as $ls)
                                                    @if($ls!=null)
                                                    @if($ls[0]['conversation_id']==$conversation->id)
                                                    <div class="last{{$conversation->id}}">
                                                        <p class="text-muted font-size-14 mb-0">{{$ls[0]['contenu']}}</p>
                                                    </div>
                                                    @break
                                                    @endif
                                                    @endif
                                                    @endforeach
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-end d-none d-md-block">
                                                        <!-- <p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="fa fa-calendar font-size-15 text-primary"></i>
                                                        3 days</p>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </td>
                                </thead>
                                <tr id="showConversation{{$conversation->id}}" style="display:none;">
                                    <td>
                                        <div class="chat" id='messageBody{{$conversation->id}}' style="width: 430px; height: 250px; overflow-y: auto;">
                                            <div class="chat-history bg-light">
                                                <ul class="m-b-0">
                                                    @foreach($conversation->messages as $messages)
                                                    @php $id_receiver=$messages->receiver_id; @endphp
                                                    @if($messages->sender_id==Auth::user()->id)
                                                    <li class="clearfix">
                                                        <div class="row">
                                                            <div class="col-4"> </div>
                                                            <div class="col-8">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="message other-message text-right float-left">{{$messages->contenu}}</div>
                                                                    </div>
                                                                    <div class="col-12 float-right">
                                                                        <div class="message-data">
                                                                            <small class="message-data-time">{{$messages->created_at->format('H:i')}}, le {{$messages->created_at->format('Y/m/d')}} </small>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </li>
                                                    @else
                                                    <li class="clearfix">
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="message my-message  text-right">{{$messages->contenu}}</div>
                                                                    </div>
                                                                    <div class="col-12 float-right">
                                                                        <div class="message-data">
                                                                            <small class="message-data-time">{{$messages->created_at->format('H:i')}}, le {{$messages->created_at->format('Y:m:d')}} </small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-4"></div>
                                                        </div>
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                    <li class="inner{{$conversation->id}}"></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="chat-message clearfix mt-3">
                                            <div class="input-group mb-0">
                                                <input type="text" class="form-control" id="msg{{$conversation->id}}" placeholder="Entrer votre message">
                                                <input id="id_conversation" type="hidden">
                                                <input id="id_receiver" type="hidden">
                                                <div class="input-group-prepend">
                                                    <span><a class="btn btn-send" id="envoyer{{$conversation->id}}">
                                                            <h6 style="color : white"><i class="fa-regular fa-paper-plane"></i></h6>
                                                        </a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
    @if(isset($annonces_voiture))
    <div class="col-md-7 ">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="card-title text-right d-block w-75 pr-2">
                            <h3>{{$annonces_voiture[0]['titre']}}</h3>
                        </div>
                        @php
                        $style=($annonces_voiture[0]['etat']=='activee'||$annonces_voiture[0]['etat']=='en attend'||$annonces_voiture[0]['etat']=='en location' ? "pointer-events: none;background-color: lightyellow; border-color:lightyellow;":"");
                        $style1=($annonces_voiture[0]['etat']=='archivee' ||$annonces_voiture[0]['etat']=='en attend'||$annonces_voiture[0]['etat']=='en location' ? "pointer-events: none;background-color: lightyellow;border-color:lightyellow;":"");

                        @endphp


                        <div class="d-block float-right w-25 ">

                            <a href="{{url('/annonce/archive/voiture/'.$annonces_voiture[0]['id'])}}" class="btn btn-primary  mb-1" <?php echo 'style="' . $style1 . '"' ?>>Archiver </a>
                            <a href="{{url('/annonce/active/voiture/'.$annonces_voiture[0]['id'])}}" class="btn btn-primary mb-1" <?php echo 'style="' . $style . '"' ?>>Activer</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6  ">
                            @php $img_p=$annonces_voiture[0]['images_voiture']
                            @endphp
                            <div class="white-box text-center mt-3"><img src="{{asset('/images/partenaireUploads/Voitures/'.$img_p[0].'')}}" class="w-100"></div>

                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                            <h4 class="box-title mt-0 text-right">Description</h4>

                            <p class="text-right"> {{$annonces_voiture[0]['description']}}</p>
                            <h2 class="mt-1 text-right">
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
    <div class="col-md-7 ">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="card-title d-block w-75 text-right pr-2">
                            <h3>{{$annonces_moto[0]['titre']}}</h3>
                        </div>
                        @php
                        $style=($annonces_moto[0]['etat']=='activee'||$annonces_moto[0]['etat']=='en attend'||$annonces_moto[0]['etat']=='en location' ? "pointer-events: none;lightyellow; border-color:lightyellow;;":"");
                        $style1=($annonces_moto[0]['etat']=='archivee' ||$annonces_moto[0]['etat']=='en attend'||$annonces_moto[0]['etat']=='en location' ? "pointer-events: none;lightyellow; border-color:lightyellow;;":"");

                        @endphp


                        <div class="d-block float-right w-25 ">

                            <a href="{{url('/annonce/archive/moto/'.$annonces_moto[0]['id'])}}" class="btn btn-primary  mb-1" <?php echo 'style="' . $style1 . '"' ?>>Archiver </a>
                            <a href="{{url('/annonce/active/moto/'.$annonces_moto[0]['id'])}}" class="btn btn-primary mb-1" <?php echo 'style="' . $style . '"' ?>>Activer</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6  ">
                            @php $img_p=$annonces_moto[0]['images_moto']
                            @endphp
                            <div class="white-box text-center mt-3"><img src="{{asset('/images/partenaireUploads/Motos/'.$img_p[0].'')}}" class="w-100"></div>

                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                            <h4 class="box-title mt-0">Description</h4>

                            <p> {{$annonces_moto[0]['description']}}</p>
                            <h2 class="mt-1">
                                {{$annonces_moto[0]['prix_par_jour']}}<small class="text-success"> MAD/jour</small>
                            </h2>

                            <h3 class="box-title mt-1">Les details de l'annonce</h3>
                            <ul class="list-unstyled w-100">
                                <li><i class="fa fa-check text-success pl-3 text-right"></i>type : {{$annonces_moto[0]['type_vehicule']}} </li>
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
    <div class="col-md-7 ">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="card-title d-block w-75 text-right">
                            <h3>{{$annonces_velo[0]['titre']}}</h3>
                        </div>
                        @php
                        $style=($annonces_velo[0]['etat']=='activee'||$annonces_velo[0]['etat']=='en attend'||$annonces_velo[0]['etat']=='en location' ? "pointer-events: none;background-color: lightyellow; border-color:lightyellow;":"");
                        $style1=($annonces_velo[0]['etat']=='archivee' ||$annonces_velo[0]['etat']=='en attend'||$annonces_velo[0]['etat']=='en location' ? "pointer-events: none;background-color: lightyellow;border-color:lightyellow;":"");

                        @endphp


                        <div class="d-block float-right w-25 ">

                            <a href="{{url('/annonce/archive/velo/'.$annonces_velo[0]['id'])}}" class="btn btn-primary  mb-1" <?php echo 'style="' . $style1 . '"' ?>>Archiver </a>
                            <a href="{{url('/annonce/active/velo/'.$annonces_velo[0]['id'])}}" class="btn btn-primary mb-1" <?php echo 'style="' . $style . '"' ?>>Activer</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6  ">

                            @php $img_p=$annonces_velo[0]['images_velo']

                            @endphp

                            <div class="white-box text-center mt-3"><img src="{{asset('/images/partenaireUploads/Vélos/'.$img_p[0].'')}}" class="w-100"></div>

                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 text-right">
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
<!--
<script>
    var id;
    var id_receiver;
    $(".clickable-row").click(function(e) {
        e.stopPropagation();
        id = $(this).data("id");
        id_receiver = $(this).data("receiver");
        $("#id_conversation").val(id);
        $("#id_receiver").val(id_receiver);

        if ($(".clickable-row").hasClass('active')) {
            $(".clickable-row").removeClass('active')
            $("#showConversation" + id).hide();
            $(".clickable-row[data-id!='" + id + "']").show();
        } else {
            $("#envoyer").addClass('thisButton');
            $("#showConversation" + id).show();
            $(".clickable-row").addClass('active');
            $(".clickable-row[data-id!='" + id + "']").hide();
            $('#messageBody' + id).scrollTop($('#messageBody' + id)[0].scrollHeight);
        }
    });

    $(".thisButton").click(function() {
        alert('hello');
        let msg = $("#msg" + id).val();
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "{{ route('message') }}",
            type: "POST",
            data: {
                msg: msg,
                id: id,
                id_receiver: id_receiver,
                _token: _token
            },
            success: function(response) {
                alert(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
</script>-->
<script>
    jQuery(document).ready(function($) {
        var id, id_receiver;
        $(".clickable-row").click(function() {
            id = $(this).data("id");
            id_receiver = $(this).data("receiver");
            if ($(".clickable-row").hasClass('active')) {
                $(".clickable-row").removeClass('active')
                $("#showConversation" + id).hide();
                $(".clickable-row[data-id!='" + id + "']").show();
            } else {
                $("#showConversation" + id).show();
                $(".clickable-row").addClass('active');
                $(".clickable-row[data-id!='" + id + "']").hide();
                $('#messageBody' + id).scrollTop($('#messageBody' + id)[0].scrollHeight);
            }
            $(document).on('click', '#envoyer' + id, function() {
                var msg = $("#msg" + id).val();
                $("#msg" + id).val('');
                let _token = $('meta[name="csrf-token"]').attr('content');
                var d = new Date();
                var month = d.getMonth() + 1;
                var day = d.getDate();
                var output = d.getFullYear() + '/' +
                    (month < 10 ? '0' : '') + month + '/' +
                    (day < 10 ? '0' : '') + day;
                var time = d.getHours() + ":" + d.getMinutes()
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('message') }}",
                    type: 'POST',
                    data: {
                        id: id,
                        id_receiver: id_receiver,
                        msg: msg,
                        _token: _token
                    },
                    success: function(response) {
                        $(".inner" + id).addClass("clearfix");
                        $(".inner" + id).append('<div class="row">' +
                            '<div class="col-4"></div>' +
                            '<div class="col-8">' +
                            '<div class="row">' +
                            '<div class="col-12">' +
                            '<div class="message other-message  text-right">' + msg + '</div>' +
                            '</div>' +
                            '<div class="col-12 float-right">' +
                            '<div class="message-data">' +
                            '<small class="message-data-time">' + time + ', le ' + output + '</small>' +
                            '</div>' +
                            '</div>' +
                            ' </div>' +
                            '</div>' +
                            '</div>');
                        $(".last" + id).empty();
                        $(".last" + id).append('<p class="text-muted font-size-14 mb-0">' + msg + '</p>');
                        $('#messageBody' + id).scrollTop($('#messageBody' + id)[0].scrollHeight);
                    }
                });
            });
        });
    });
</script>

@endsection