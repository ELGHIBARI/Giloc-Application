@extends('layouts.app')
@section('head')
<link href="{{ asset('css/AddAnnonceStyle.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('js/AddAnnonceStyle.js') }}"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="row">

        <div class="cadr">
            <div class="cadr-header">
                <h6>Edition de l'annonce</h6>
            </div>
        </div>

        <div class="col-md-12">
            <form action="{{route('profiluser.store',$users->id) }}" method="post">
                @csrf
                @method('PUT')
                <fieldset>
                    <div class="form-group row">
                        <label for="id" class="col-3"> ID</label>
                        <div class="col-9">
                            <input type="number" id="id" name="id" class="form-control" value="{{$users->id}}" readonly>

                        </div>
                    </div>






                    <div class="form-group row">
                        <label for="type_vehicule" class="col-3">Nom complet</label>
                        <div class="col-9">
                            <input type="text" id="nom_complet" class="form-control" name="nom_complet" value="{{$users->nom_complet}}" required>

                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="email" class="col-3">Email</label>
                        <div class="col-9">
                            <input type="email" id="email" name="email" class="form-control" value="{{$users->email}}" required>

                        </div>
                    </div>








                    <div class=" form-group row">

                        <label for="numero_telephone" class="col-3">Numéro de téléphone</label>
                        <div class="col-9">
                            <input type='number' id="numero_telephone" class='form-control' name='numero_telephone' step="0.5" value="{{$users->numero_telephone}}" required />
                        </div>


                    </div>
        </div>




        <div class="form-group row">
            <label for="ville" class="col-3">Ville</label>
            <!--<select class="list-dt" name="ville">-->
            <div class="col-9">
                <select class="form-control" name="ville" value="{{$users->ville}}" required>
                    <option value="Tétouan">Tétouan</option>
                    <option value="Tanger">Tanger</option>
                    <option value="Casablanca">Casablanca</option>
                    <option value="Rabat">Rabat</option>
                    <option value="Meknès">Meknès</option>
                    <option value="Fès">Fès</option>
                    <option value="Agadir">Agadir</option>
                    <option value="Marrakech">Marrakech</option>
                </select>
            </div>
        </div>




        <div class="form-group row">
            <label for="role" class="col-3">Role</label>
            <!--<select class="list-dt" name="ville">-->
            <div class="col-9">
                <select class="form-control" name="role" value="{{$users->role}}" required>
                    <option value="client">Client</option>
                    <option value="partenaire">Partenaire</option>

                </select>
            </div>
        </div>



        <div class="form-group row">

            <label for="id" class="col-3">Photo de profile</label>
            <div class="col-9">
                <input type="file" placeholder="photo" name="avatar" value="{{$users->avatar}}" class="form-control" required />
                <!-- <input type="hidden" name="avatar" value="{{Auth::user()->avatar}}" />-->
                <img width="100" src="{{asset('images/avatar/'.$users->avatar)}}" />
            </div>

        </div>












        <div class="form-group row">
            <label for="" class="col-3"></label>
            <div class="col-9">
                <button type="submit" class="btn btn-sm btn-primary">Ajouter</button>
            </div>
        </div>
        </fieldset>
        </form>
    </div>
</div>
</div>
@endsection