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
        <form  action="{{route('annonces.update',$annonce->id) }}" method="post">
            @csrf
            @method('PUT')
            <fieldset>
                        <div class="form-group row">
                            <label for="id" class="col-3"> ID</label>
                            <div class="col-9">
                                <input type="number" id="id" name="id" class="form-control" value="{{$annonce->id}}" readonly>
                               
                            </div>
                        </div> 
                        
                        
                        
                        
                        
                        
                        <div class="form-group row">
                            <label for="type_vehicule" class="col-3">Type de vehicule</label>
                            <div class="col-9">
                                <input type="text" id="type_vehicule" class="form-control" name="type_vehicule" value="{{$annonce->type_vehicule}}" readonly>
                                
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="titre" class="col-3">Titre d'annonce</label>
                            <div class="col-9">
                                <input type="text" id="titre" name="titre" class="form-control" value="{{$annonce->titre}}" required >
                               
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="etat" class="col-3">Etat d'annonce</label>
                            <div class="col-9">
                               
                                <select class="form-control" name="etat" value="{{$annonce->etat}}" required >
                                                                        
                                                                        <option value="disponible" >Disponible</option>
                                                                        <option value="en_location" >En location</option>
                                                                        <option value="archive" >Archivé</option>
                                                                        <option value="en_attente" >En attente</option>
                                                                    </select>
                            </div>
                        </div>


                   
                       

                                    <div class=" form-group row">
                                            
                                                <label for="prix_par_jour" class="col-3">Prix par jour</label>
                                                <div class="col-6">
                                                <input type='number' id="prix_par_jour" class='form-control' name='prix_par_jour' step="0.5" value="{{$annonce->prix_par_jour}}" required/>
                                            </div>
                                            
                                                <label for="prix">&nbsp;</label>
                                                <div class="col-md-2">
                                                <input type='' class='form-control' placeholder="MAD" readonly />
                                    </div>
 </div>


                                            <div class="form-group row">
                                           
                                                <label for="date_desponibilite" class="col-3">Date de disponibilité</label> 
                                                <div class="col-9">
                                                <input type='date' id="date_desponibilite" class='form-control' name='date_desponibilite' value='{{$annonce->date_desponibilite}}'required/>
                                          </div>
</div>
                                              <div class="form-group row">
                                              <label for="description" class="col-3">Partenaire</label>
                                             <div class="col-9">
                                              <input type="text" id="user_id" name="user_id" class="form-control" value="{{$annonce->user_id}}" required>
                                            <a href="{{route('profiluser')}}">voir le profile</a>
                                
                                             </div>
                                       </div>

                                       <div class="form-group row">
                                       <label for="ville" class="col-3">Ville</label>
                                                <!--<select class="list-dt" name="ville">-->
                                                <div class="col-9">
                                                <select class="form-control" name="ville" value="{{$annonce->ville}}"required>
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
                                              <label for="description" class="col-3">Description d'annonce</label>
                                             <div class="col-9">
                                              <textarea type="textarea" id="description" name="description" class="form-control" value="{{$annonce->description}}" required ></textarea>
                                
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