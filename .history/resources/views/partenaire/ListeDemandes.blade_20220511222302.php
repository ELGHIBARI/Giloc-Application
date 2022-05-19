@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right">{{ __('Espace Partenaire') }}</div>

                <div class="card-body text-right">
                 @foreach($demandes as $demande){
                    {{$demande->userAnnonce->titre ?? None}} 
                 }
                 @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
