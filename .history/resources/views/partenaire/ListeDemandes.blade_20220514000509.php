@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right">{{ __('La liste des demandes') }}</div>

                <div class="card-body text-right">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">Numéro de demande</th>
                                <th scope="col">Date de début de location</th>
                                <th scope="col">Date de fin de location</th>
                                <th scope="col">Annonce Associée</th>
                                <th scope="col">Véhicule Associée</th>
                                <th scope="col">Client Interssé</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($demandes as $demande)
                            @foreach($demande->userAnnonce as $annonce)
                            <tr class='clickable-row' data-href="{{ url('demande/details/'.$demande->id.'/'.$demande->client_id) }}">
                                <td>{{$demande->id}}</td>
                                <td>{{$annonce->date_debut}}</td>
                                <td>{{$annonce->date_fin}}</td>
                                <td>{{$annonce->titre}}</td>
                                <td>{{$annonce->type_vehicule}}</td>
                                <td>{{$annonce->userDemande->nom_complet}}</td>
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
           // var id=$(this).data("id");
        });
    });
</script>
@endsection