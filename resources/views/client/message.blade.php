{{-- @extends('layouts.app') --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GILOC</title>
        <link rel="icon" href="assets/images/items/1.jpg" type="image/x-icon"/>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

       <!-- Custom styles for this template -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="/assets/css/bootstrap.css" rel="stylesheet">
        <link href="/assets/css/ui.css" rel="stylesheet">
        <link href="/assets/css/responsive.css" rel="stylesheet">
        <link href="/assets/css/responsive.css" rel="stylesheet">

        {{-- <link href="css/comments.css" rel="stylesheet"> --}}
        
        <link href="/assets/css/all.min.css" rel="stylesheet">
        <script src="/assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="/assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    </head>
    <body>
       
@include('incs.navbar')
{{-- @section('content') --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header text-right">{{ __('La liste des messages') }}</div>

                <div class="card-body text-right">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                {{-- <th scope="col">Numéro de demande</th> --}}
                                {{-- <th scope="col">Contact</th> --}}
                                {{-- <th scope="col">Message</th> --}}
                                {{-- <th scope="col">Envoyé le</th> --}}
                                {{-- <th scope="col">notification</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($conversations as $conversation)
                            @foreach($conversation->messages as $message)


                            {{-- @php
                                if($demande['etat'] == 0){$etat = 'En attente';
                                $couleur ='text-primary';} 
                                else if($demande['etat'] == 1){$etat = 'Accepté';
                                $couleur ='text-success';}   
                                else if($demande['etat'] == -1){ $etat = 'Refusé';
                                $couleur ='text-danger';}  
                            @endphp --}}
                                
                            <tr class='table table-striped'>
                                <td>{{$conversation['partenaire_id']}}</td>
                                <td>{{$message['contenu']}}</td>
                                <td class="ml-3 mb-3"><small>{{$message['created_at']}}</small></td>
                                {{-- <td class='{{}}'>{{ '2'}}</td> --}}
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>
{{-- @endsection --}}