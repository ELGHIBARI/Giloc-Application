@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($Annonces as $annonce)
                @foreach($annonce->demandeAnnonce as $demande)
                <div class="card-header text-right">Details de la demande du client : {{ }}</div>

                <div class="card-body text-right">
                    @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection