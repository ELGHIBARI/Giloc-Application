<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GILOC</title>
    <link rel="icon" href="assets/images/items/1.jpg" type="image/x-icon" />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/css/ui.css" rel="stylesheet">
    <link href="/assets/css/responsive.css" rel="stylesheet">
    <link href="/assets/css/responsive.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/8ab724eb48.js" crossorigin="anonymous"></script>

    {{-- <link href="css/comments.css" rel="stylesheet"> --}}

    <link href="/assets/css/all.min.css" rel="stylesheet">
    <script src="/assets/js/jquery.min.js" type="text/javascript"></script>
    <link href="{{ asset('css/MessagePanelStyle.css') }}" rel="stylesheet">
    <script src="/assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
</head>

<body>

    @include('incs.navbar')

    <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content">
        <div class="container mt-2">
            @if(($annonces[0]->type_vehicule == "voiture"))
            <header class="section-heading">
                <h3 class="section-title"></h3>
            </header><!-- sect-heading -->

            <div class="row mt-2 ml-4 mr-4">
                @foreach($annonces as $annonce)
                <div class="col-md-7">
                    <div href="#" class="card card-product-grid h-100">
                        {{-- <a href="#" class="img-wrap"> <img src="assets/images/items/5.jpg"> </a> --}}
                        <div id="carouselExampleIndicators" class="carousel" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @for($i=0;$i<=count($images)-1;$i++) <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="img{{$i}}">
                                    </li>
                                    @endfor
                            </ol>
                            <div class="carousel-inner">
                                @if($annonce->type_vehicule=="voiture")
                                @php $i=0 @endphp
                                @foreach($images as $image)
                                <div class="carousel-item img{{$i}}">
                                    <img style="height : 300px; width : 100%" src="{{asset('/images/partenaireUploads/Voitures/'.$image.'')}}" alt="First slide">
                                </div>
                                @php $i++ ;@endphp
                                @endforeach
                                @endif
                                @if($annonce->type_vehicule=="moto")
                                @php $i=0 @endphp
                                @foreach($images as $image)
                                <div class="carousel-item img{{$i}}">
                                    <img style="height : 300px; width : 100%" src="{{asset('/images/partenaireUploads/Motos/'.$image.'')}}" alt="First slide">
                                </div>
                                @php $i++ ;@endphp
                                @endforeach
                                @endif
                                @if($annonce->type_vehicule=="velo")
                                @php $i=0 @endphp
                                @foreach($images as $image)
                                <div class="card-img-top carousel-item img{{$i}}">
                                    <img class="d-block w-100" style="height : 400px;" src="{{asset('/images/partenaireUploads/Vélos/'.$image.'')}}" alt="First slide">
                                </div>
                                @php $i++ ;@endphp
                                @endforeach
                                @endif
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <figcaption class="info-wrap">
                            <div class="row m-1">
                                <div class="col-md-10">
                                    {{ $annonce->titre }}
                                    <div class="rating-wrap">
                                        <ul class="rating-stars">
                                            <li style="width:80%" class="stars-active">
                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                            </li>
                                        </ul>
                                        <span class="label-rating text-muted"> 34 reviws</span>
                                    </div>
                                </div>
                                <div class="col-md-2 m-l-2">
                                    <span style="color:#fc916d; font-size:500">
                                        <h6>{{ $annonce->prix_par_jour }} DH</h6>
                                    </span>
                                    <a href="" class="btn btn-success d-block" data-bs-toggle="modal" data-bs-target="#ajouterClientModal"><span><i class="fa fa-comments" aria-hidden="true"></i></span> </a>
                                </div>
                            </div>
                        </figcaption>
                    </div>
                </div> <!-- col.// -->

                <div class="col-md-4" id="details">
                    <div href="#" class="card card-product-grid h-100">
                        <figcaption class="info-wrap m-3">
                            <h5 class="title">{{ $annonce->titre }}</h5>
                            <div class="price mt-1"><span class="label-rating text-muted"><label for="">Prix par jour :</label></span>
                                {{ $annonce->prix_par_jour }} MAD
                            </div> <!-- price-wrap.// -->

                            <div class="price mt-1"><span class="label-rating text-muted"><label for="">Description :</label></span>
                                {{ $annonce->description }}
                            </div> <!-- price-wrap.// -->
                            <p class="description">
                            <p>
                            <div class="price mt-1"><span class="label-rating text-muted"><label>Marque :</label></span>{{ $vehicules[0]->marque }}<br /></div>
                            <div class="price mt-1"><span class="label-rating text-muted"><label>modele :</label></span>{{ $vehicules[0]->modele }}<br /></div>
                            <div class="price mt-1"><span class="label-rating text-muted"><label>annee modele :</label></span>{{ $vehicules[0]->annee_modele }}<br /></div>
                            <div class="price mt-1"><span class="label-rating text-muted"><label>Type carburant :</label></span>{{ $vehicules[0]->Type_carburant }}<br /></div>
                            <div class="price mt-1"><span class="label-rating text-muted"><label>Puissance fiscale :</label></span>{{ $vehicules[0]->Puissance_fiscale }}<br /></div>
                            <div class="price mt-1"><span class="label-rating text-muted"><label>nombre de places :</label></span>{{ $vehicules[0]->nombre_places }}<br /></div>
                            {{-- <label>annee modele :</label>{{ $annonce['modele'] }}<br /> --}}
                            </p>
                            </p>
                            <form>
                                @csrf
                                <div class="d-block mt-3">
                                    {{-- <input type="hidden" name="id_annonce" value={{  }}> --}}
                                    <a href="{{ url('reservation/' . $annonce->id .'/'.Auth::user()->id.'/'.$annonce->date_debut.'/'.$annonce->date_fin.'/'.$annonce->prix_par_jour) }}" class="btn btn-warning col-md-9 ml-1">Réserver</a>
                                </div>
                            </form>
                        </figcaption>
                    </div>
                </div>
                @foreach($conversations as $conversation)
                <div style="overflow-x:auto;" id="conversation">
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


                @php
                $id_annonce= $annonce->id;
                $id_partenaire = $annonce->user_id;
                @endphp
                @endforeach
            </div>
            @endif
            <div class="container mt-5">
                <div class="row  mt-2 ml-4 mr-4 justify-content-center">
                    <div class="col-md-12">
                        <div class="headings d-flex justify-content-between align-items-center mb-3">
                            <h5>Unread comments(6)</h5>

                            <div class="buttons">

                                <span class="badge bg-white d-flex flex-row align-items-center">
                                    <span class="text-primary">Comments "ON" </span>
                                    <div class="form-check form-switch ml-2">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                    </div>
                                </span>

                            </div>

                        </div>



                        <div class="card-cmt p-3">

                            <div class="d-flex justify-content-between align-items-center">

                                <div class="user d-flex flex-row align-items-center">

                                    <img src="https://i.imgur.com/hczKIze.jpg" width="30" class="user-img rounded-circle mr-2">
                                    <span><small class="font-weight-bold text-primary">james_olesenn</small> <small class="font-weight-bold">Hmm, This poster looks cool</small></span>

                                </div>


                                <small>2 days ago</small>

                            </div>


                            <div class="action d-flex justify-content-between mt-2 align-items-center">

                                <div class="reply px-4">
                                    <small>Remove</small>
                                    <span class="dots"></span>
                                    <small>Reply</small>
                                    <span class="dots"></span>
                                    <small>Translate</small>

                                </div>

                                <div class="icons align-items-center">

                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-check-circle-o check-icon"></i>

                                </div>

                            </div>



                        </div>







                        <div class="card-cmt p-3 mt-2">

                            <div class="d-flex justify-content-between align-items-center">

                                <div class="user d-flex flex-row align-items-center">

                                    <img src="https://i.imgur.com/C4egmYM.jpg" width="30" class="user-img rounded-circle mr-2">
                                    <span><small class="font-weight-bold text-primary">olan_sams</small> <small class="font-weight-bold">Loving your work and profile! </small></span>

                                </div>


                                <small>3 days ago</small>

                            </div>


                            <div class="action d-flex justify-content-between mt-2 align-items-center">

                                <div class="reply px-4">
                                    <small>Remove</small>
                                    <span class="dots"></span>
                                    <small>Reply</small>
                                    <span class="dots"></span>
                                    <small>Translate</small>

                                </div>

                                <div class="icons align-items-center">
                                    <i class="fa fa-check-circle-o check-icon text-primary"></i>

                                </div>

                            </div>



                        </div>










                        <div class="card-cmt p-3 mt-2">

                            <div class="d-flex justify-content-between align-items-center">

                                <div class="user d-flex flex-row align-items-center">

                                    <img src="https://i.imgur.com/0LKZQYM.jpg" width="30" class="user-img rounded-circle mr-2">
                                    <span><small class="font-weight-bold text-primary">rashida_jones</small> <small class="font-weight-bold">Really cool Which filter are you using? </small></span>

                                </div>


                                <small>3 days ago</small>

                            </div>


                            <div class="action d-flex justify-content-between mt-2 align-items-center">

                                <div class="reply px-4">
                                    <small>Remove</small>
                                    <span class="dots"></span>
                                    <small>Reply</small>
                                    <span class="dots"></span>
                                    <small>Translate</small>

                                </div>

                                <div class="icons align-items-center">
                                    <i class="fa fa-user-plus text-muted"></i>
                                    <i class="fa fa-star-o text-muted"></i>
                                    <i class="fa fa-check-circle-o check-icon text-primary"></i>

                                </div>

                            </div>



                        </div>






                        <div class="card-cmt p-3 mt-2">

                            <div class="d-flex justify-content-between align-items-center">

                                <div class="user d-flex flex-row align-items-center">

                                    <img src="https://i.imgur.com/ZSkeqnd.jpg" width="30" class="user-img rounded-circle mr-2">
                                    <span><small class="font-weight-bold text-primary">simona_rnasi</small> <small class="font-weight-bold text-primary">@macky_lones</small> <small class="font-weight-bold text-primary">@rashida_jones</small> <small class="font-weight-bold">Thanks </small></span>

                                </div>


                                <small>3 days ago</small>

                            </div>


                            <div class="action d-flex justify-content-between mt-2 align-items-center">

                                <div class="reply px-4">
                                    <small>Remove</small>
                                    <span class="dots"></span>
                                    <small>Reply</small>
                                    <span class="dots"></span>
                                    <small>Translate</small>

                                </div>

                                <div class="icons align-items-center">

                                    <i class="fa fa-check-circle-o check-icon text-primary"></i>

                                </div>

                            </div>



                        </div>













                    </div>



                </div>

            </div>

        </div>


        </div>
    </section>
    <!--############################################################ Modal Ajouter ################################################################################ -->

    <div class="modal fade" id="ajouterClientModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Conntacter le propriètaire</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container">
                    <div class="client-info-cont container">
                        <div class="alert-message-danger col-md-12">
                        </div>
                        <form class="form row" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" role="form" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <input type="hidden" name="id_annonce" value="{{ $id_annonce }}">
                                <input type="hidden" name="id_partenaire" value="{{ $id_partenaire }}">
                                <label class="form-label" for="name"><strong>Votre message:</strong></label>
                                <textarea type="text" class="form-control" id="message" name="message" placeholder="votre message ..."></textarea>
                            </div>



                            <br>

                            <span class="help-inline"></span>
                            <div class="modal-footer">
                                <button type="submit" name="ajouter_agent" class="btn btn-success"><span class="bi bi-check-all"></span> Envoyer</button>
                                <a class="btn btn-primary" href="agents.php"><span class="bi-arrow-left"></span>Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Modal -->



    @include('incs.NosPartenaires')
    @include('incs.footer')

    <script>
        // $('#bologna-list a').on('click', function(e) {
        //     e.preventDefault()
        //     $(this).tab('show')
        // });

        $(window).on("load", function() {
            var nslide = $(".img0").data("slide-to");
            console.log(nslide);
            if (nslide == 0)
                $(".img0").addClass("active");
        });
        jQuery(document).ready(function($) {
            var id, id_receiver;
            $(".").click(function() {
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
    <<style>

        .carousel_img img{
        width: 40%;
        height: 50px;
        margin-top:
        }
        .card-cmt {

        border: none;
        box-shadow: 5px 6px 6px 2px #e9ecef;
        border-radius: 4px;
        }


        .dots{

        height: 4px;
        width: 4px;
        margin-bottom: 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        }

        .badge{

        padding: 7px;
        padding-right: 9px;
        padding-left: 16px;
        box-shadow: 5px 6px 6px 2px #e9ecef;
        }

        .user-img{
        margin-top: 4px;
        }

        .check-icon{

        font-size: 17px;
        color: #c3bfbf;
        top: 1px;
        position: relative;
        margin-left: 3px;
        }

        .form-check-input{
        margin-top: 6px;
        margin-left: -24px !important;
        cursor: pointer;
        }


        .form-check-input:focus{
        box-shadow: none;
        }


        .icons i{

        margin-left: 8px;
        }
        .reply{

        margin-left: 12px;
        }

        .reply small{

        color: #b7b4b4;

        }


        .reply small:hover{

        color: green;
        cursor: pointer;

        }
        </style>