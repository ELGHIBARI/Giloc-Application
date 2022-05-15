@extends('layouts.app')
@section('head')
<link href="{{ asset('css/AnnonceDetailStyle.css') }}" rel="stylesheet">
<link href="{{ asset('css/MessagePanelStyle.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('js/MessagePanel.js') }}"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
@endsection


@section('content')
<div class="row">
    <div class="col-md-4">
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
                    <table>
                        <tr class="clickable-row">
                            <td>
                                <ul class="list-unstyled activity-wid mb-0 ">
                                    @foreach($conversations as $conversation)
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
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
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
<div style="display: none;" id="message">
    <div class="chat_window text-right">
        <div class="top_menu">
            <div class="buttons">
                <div class="button close"></div>
                <div class="button minimize"></div>
                <div class="button maximize"></div>
            </div>
            <div class="title">Chat</div>
        </div>
        <ul class="messages"></ul>
        <div class="bottom_wrapper clearfix">
            <div class="message_input_wrapper">
                <input class="message_input" placeholder="Type your message here..." />
            </div>
            <div class="send_message">
                <div class="icon"></div>
                <div class="text">Send</div>
            </div>
        </div>
    </div>
    <div class="message_template">
        <li class="message">
            <div class="avatar"></div>
            <div class="text_wrapper">
                <div class="text"></div>
            </div>
        </li>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            $("#message").show();
        });
    });
</script>
@endsection