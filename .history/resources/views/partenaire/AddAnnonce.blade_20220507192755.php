@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-right">{{ __('Ajouter une annonce') }}</div>

                <div class="card-body text-right">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="titre">Titre d'annonce</label>
                                <input type="text" class="form-control" name="titre">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date_dispo">Date de disponibilité</label>
                                <input type="date" class="form-control" name="date_dispo">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="prix">Prix par jour</label>
                                <input type="text" class="form-control" name="prix">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ville">Ville</label>
                                <select class="form-control" name="ville">
                                    <option value="Tétouan">Tétouan</option>
                                    <option value="Tanger">Tanger</option>
                                    <option value="Casablanca">Casablanca</option>
                                    <option value="Rabat">Rabat</option>
                                    <option value="Tétouan">Tétouan</option>
                                    <option value="Meknès">Meknès</option>
                                    <option value="Tétouan">Tétouan</option>
                                    <option value="Fès">Fès</option>
                                    <option value="Tétouan">Tétouan</option>
                                    <option value="Agadir">Agadir</option>
                                    <option value="Marrakech">Marrakech</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                                <label for="typeAnnonce">Type d'annonce</label>
                                <select  id="purpose" class="form-control" name="typeAnnonce">
                                    <option value="normale">Normale</option>
                                    <option value="premium">Premium</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ville">Ville</label>
                                <select class="form-control" name="ville">
                                    <option value="Tétouan">Tétouan</option>
                                    <option value="Tanger">Tanger</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    $('#purpose').on('change', function() {
      if (this.value === 'premium') {
        $("#dureePremium").show();
      } else {
        $("#dureePremium"").hide();
      }


    });
   
  </script>