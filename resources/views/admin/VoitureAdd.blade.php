@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <form  action="{{ route('voitures.store') }}" method="POST">
            @csrf
                        <div class="form-group row">
                            <label for="id" class="col-3"> ID</label>
                            <div class="col-9">
                                <input type="number" id="id" name="id" class="form-control" >
                                @error('id')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="marque" class="col-3">marque</label>
                            <div class="col-9">
                                <input type="text" id="marque" name="marque" class="form-control" >
                                @error('marque')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="modele" class="col-3">modele</label>
                            <div class="col-9">
                                <input type="text" id="modele" class="form-control" name="modele">
                                @error('modele')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="annee_modele" class="col-3">annee_modele</label>
                            <div class="col-9">
                                <input type="number" id="annee_modele" name="annee_modele" class="form-control" >
                                @error('annee_modele')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Type_de_carburant" class="col-3">Type de carburant</label>
                            <div class="col-9">
                                <input type="text" id="Type_de_carburant" name="Type_de_carburant" class="form-control" >
                                @error('Type_de_carburant')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Puissance_fiscale" class="col-3">Puissance fiscale</label>
                            <div class="col-9">
                                <input type="text" id="Puissance_fiscale" name="Puissance_fiscale" class="form-control" >
                                @error('Puissance_fiscale')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="nombre_places" class="col-3">nombre_places</label>
                            <div class="col-9">
                                <input type="number" id="nombre_places" name="nombre_places" class="form-control">
                                @error('nombre_places')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="btn btn-sm btn-primary">Ajouter</button>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection