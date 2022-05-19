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
                                        <!--<p class="text-muted font-size-13 mt-2 pt-1 mb-0"><i class="fa fa-calendar font-size-15 text-primary"></i>
                                            3 days</p>-->
                                    </div>
                                </div>

                            </div>
                        </li>
                    </ul>
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
                                                    <h5 class="font-size-15 mb-1">Message</h5>
                                                    <p class="text-muted font-size-14 mb-0">{{$conversation->userConversation->nom_complet}}</p>
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

</div>

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

            }
            $('#messageBody' + id).scrollTop($('#messageBody' + id)[0].scrollHeight);
            $("#envoyer"+id).click(function(event) {
                event.preventDefault();

                let msg = $("#msg"+id).val();
                let _token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: "message",
                    type: "GET",
                    data: {
                        msg: msg,
                        id: id,
                        id_receiver: id_receiver,
                        _token: _token
                    },
                    success: function(data) {
                        data[0].value;
                        
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

        });
    });
</script>

@endsection