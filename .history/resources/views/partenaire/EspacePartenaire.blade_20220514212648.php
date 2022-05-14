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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right">{{ __('Espace Partenaire') }}</div>

                <div class="card-body text-right">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="chat_window">
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
            </div>
        </div>
    </div>
</div>
@endsection
