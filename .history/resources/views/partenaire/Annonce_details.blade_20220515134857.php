@extends('layouts.app')
@section('head')
<link href="{{ asset('css/AnnonceDetailStyle.css') }}" rel="stylesheet">
<link href="{{ asset('css/MessagePanelStyle.css') }}" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
<style>
    .mytable thead:hover {
        background-color: lightcyan
    }
</style>
@endsection


@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4 text-right">Demandes </h4>
                    <ul class="list-unstyled activity-wid mb-0">
                        <li class="activity-list activity-border">
                            <div class="activity-icon avatar-sm">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="avatar-sm rounded-circle" alt="">
                            </div>
                            <div class="media">
                                <div class="me-3">
                                    <h5 class="font-size-15 mb-1">Demande de location</h5>
                                    <p class="text-muted font-size-14 mb-0">Anass el 1</p>
                                </div>

                                <div class="media-body">
                                    <div class="text-end d-none d-md-block">
                                        <p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="fa fa-calendar font-size-15 text-primary"></i>
                                            3 days</p>
                                    </div>
                                </div>

                            </div>
                        </li>


                    </ul>
                    <h4 class="header-title mb-4 text-right">Messages </h4>
                    <ul class="list-unstyled activity-wid mb-0 ">
                        @foreach($conversations as $conversation)
                        <table class="table mytable">
                            <thead class="clickable-row" data-id="{{$conversation->id}}">
                                <td>
                                    <li class="activity-list activity-border">
                                        <div class="activity-icon avatar-sm">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="avatar-sm rounded-circle" alt="">
                                        </div>
                                        <div class="media">
                                            <div class="me-3">
                                                <h5 class="font-size-15 mb-1">Message</h5>
                                                <p class="text-muted font-size-14 mb-0">{{$conversation->userConversation->nom_complet}}</p>
                                            </div>

                                            <div class="media-body">
                                                <div class="text-end d-none d-md-block">
                                                    <p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="fa fa-calendar font-size-15 text-primary"></i>
                                                        3 days</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </td>
                            </thead>
                            <tr id="showConversation{{$conversation->id}}" style="display:none">
                                <td>
                                    <div class="chat" style="overflow: auto;">
                                        <div class="chat-history">
                                            <ul class="m-b-0">
                                                @foreach($conversation->messages as $messages)
                                                @php $id_receiver=$messages->receiver_id; @endphp
                                                @if($messages->sender_id==Auth::user()->id)
                                                <div class="row">
                                                    <li class="clearfix">
                                                        <div class="col-lg-4"> </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="message other-message">{{$messages->contenu}}</div>
                                                    <div class="message-data">
                                                        <span class="message-data-time">{{$messages->created_at->format('H:i')}}, le {{$messages->created_at->format('Y:m:d')}} </span>
                                                    </div>
                                                </div>
                                                </li>
                                        </div>


                                        @else
                                        <li class="clearfix">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="message my-message float-right">{{$messages->contenu}}</div>
                                                    <div class="message-data text-right">
                                                        <span class="message-data-time">{{$messages->created_at->format('H:i')}}, le {{$messages->created_at->format('Y:m:d')}} </span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                </div>
                                            </div>

                                        </li>
                                        @endif
                                        @endforeach
                    </ul>
                </div>
                <div class="chat-message clearfix">
                    <div class="input-group mb-0">
                        <div class="input-group-prepend">
                            <input type="text" class="form-control" id="msg" placeholder="Enter text here...">
                            <button type="button" class="envoyer btn btn-succes" data-id="{{ $id_receiver }}">envoyer</button>
                        </div>
                    </div>
                </div>
            </div>
            </td>
            </tr>
            </table>

            @endforeach

            </ul>
        </div>
    </div>
</div>
</div>
<div class="col-md-7">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-right" style="color : #bc3906;">{{$annonces_voiture[0]['titre']}}</h3>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        @php $img_p=$annonces_voiture[0]['images_voiture']
                        @endphp
                        <div class="white-box text-center "><img src="{{asset('/images/partenaireUploads/Voitures/'.$img_p.'')}}" class="w-100"></div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <h4 class="box-title mt-0 text-right" style="color : #bc3906;">Description</h4>
                        <p class="text-right"> {{$annonces_voiture[0]['description']}}</p>
                        <h6 class="text-right" class="mt-1">
                            {{$annonces_voiture[0]['prix_par_jour']}}<small class="text-success"> MAD/jour</small>
                        </h6>

                        <h6 class="box-title mt-1 text-right" style="color : #bc3906;">Les details de l'annonce</h6>
                        <ul class="list-unstyled">
                            <li class="text-right"><i class="fa fa-check text-success pl-3"></i>type : {{$annonces_voiture[0]['type_vehicule']}} </li>
                            <li class="text-right"><i class="fa fa-check text-success pl-3"></i>Date de Desponibilite : {{$annonces_voiture[0]['date_disponibilite']}} </li>
                            <li class="text-right"><i class="fa fa-check text-success pl-3"></i>Ville : {{$annonces_voiture[0]['ville']}} </li>
                            <li class="text-right"><i class="fa fa-check text-success pl-3"></i>Etat : {{$annonces_voiture[0]['etat']}} </li>
                            <li class="text-right"><i class="fa fa-check text-success pl-3"></i>Premium : {{$annonces_voiture[0]['premium']}} </li>
                            <li class="text-right"><i class="fa fa-check text-success pl-3"></i>Date Premium : {{$annonces_voiture[0]['premium']==1 ? "".$annonces_voiture[0]['duree_premium']."" : "0"}}</li>
                        </ul>
                        <h6 class="box-title mt-1 text-right" style="color : #bc3906;">Les details de vehicule </h6>
                        <ul class="list-unstyled">
                            <li class="text-right"><i class="fa fa-check text-success pl-3"></i>Marque : {{$annonces_voiture[0]['marque']}} </li>
                            <li class="text-right"><i class="fa fa-check text-success pl-3"></i>Modele : {{$annonces_voiture[0]['modele']}} </li>
                            <li class="text-right"><i class="fa fa-check text-success pl-3"></i>Annee modele : {{$annonces_voiture[0]['annee_modele']}} </li>
                            <li class="text-right"><i class="fa fa-check text-success pl-3"></i>Puissance fiscale : {{$annonces_voiture[0]['Puissance_fiscale']}} </li>
                            <li class="text-right"><i class="fa fa-check text-success pl-3"></i>Nombre places : {{$annonces_voiture[0]['nombre_places']}} </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    jQuery(document).ready(function($) {
        var id;
        $(".clickable-row").click(function() {
            id = $(this).data("id");

            if ($(".clickable-row").hasClass('active')) {
                $(".clickable-row").removeClass('active')
                $("#showConversation" + id).hide();
                $(".clickable-row[data-id!='" + id + "']").show();
            } else {
                $("#showConversation" + id).show();
                $(".clickable-row").addClass('active');
                $(".clickable-row[data-id!='" + id + "']").hide();

            }
        });
        $('.envoyer').click(function() {
            var id_receiver = $(this).data("id");
            var msg = $('#msg').val();
            var c = 23;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: 'company/salary-user',
                type: 'POST',
                data: {
                    id: id,
                    id_receiver: id_receiver,
                    msg: msg
                },
                success: function(response) {
                    $(".inner").append("<p>Test</p>");
                }
            });
        });
    });
</script>

@endsection