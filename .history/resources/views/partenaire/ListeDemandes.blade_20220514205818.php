@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right">{{ __('La liste des demandes') }}</div>

                <div class="card-body text-right">
                    <div style="overflow-x:auto;">
                        <table class="table table-hover ">
                            <thead>
                                <div class="row">
                                    <div class="col-md-12">
                                        <tr>
                                            <th scope="col">Numéro de demande</th>
                                            <th scope="col">Date de début de location</th>
                                            <th scope="col">Date de fin de location</th>
                                            <th scope="col">Annonce Associée</th>
                                            <th scope="col">Véhicule Associée</th>
                                            <th scope="col">Client Interssé</th>
                                        </tr>
                                    </div>
                                </div>

                            </thead>
                            <tbody>
                                @foreach($demandes as $demande)
                                <tr class='clickable-row' data-href="{{ url('demande/details/'.$demande->id.'/'.$demande->client_id .'/'.$demande->id) }}">
                                    <td>{{$demande->id}}</td>
                                    <td>{{$demande->date_debut}}</td>
                                    <td>{{$demande->date_fin}}</td>
                                    <td>{{$demande->userAnnonce->titre}}</td>
                                    <td>{{$demande->userAnnonce->type_vehicule}}</td>
                                    <td>{{$demande->userDemande->nom_complet}}</td>
                                </tr>
                                @endforeach
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
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
            // var id=$(this).data("id");
        });
    });
</script>
@endsection