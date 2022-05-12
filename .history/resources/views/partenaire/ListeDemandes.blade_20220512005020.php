@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right">{{ __('La liste des demandes') }}</div>

                <div class="card-body text-right">
                    @foreach($Annonces as $annonce)
                    @foreach($annonce->demandeAnnonce as $demande)
                    {{ $demande->prix_total }}
                    {{$demande->userDemande->nom_complet }}
                    {{ $annonce->titre; }}
                    @endforeach
                    @endforeach
                    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
                    <tbody>
                        <tr class='clickable-row' data-href='url://'>
                            <td>Blah Blah</td>
                            <td>1234567</td>
                            <td>£158,000</td>
                        </tr>
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
@endsection