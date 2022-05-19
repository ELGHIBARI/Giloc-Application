@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right">{{ __('Espace Partenaire') }}</div>

                <div class="card-body text-right">
                foreach($Annonces as $annonce){ 

echo $annonce->titre;

foreach($annonce->demandeAnnonce as $demande){ 

    echo $demande->prix_total;
    echo $demande->userDemande->nom_complet;

   }
}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
