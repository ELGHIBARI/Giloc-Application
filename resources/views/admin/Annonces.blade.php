@extends('layouts.app')

@section('content')


       <div class="container">
            <div class="row">
                   <div class="col-lg-12">
                       <strong><font color=#F9810A style="float:left;"> <h6>Les Annonces</h6></strong></font> 
                            
                            <div class="card-body">
                                <div class="basic-form">
                                    @php

                                    @endphp
                                    <form class="form-valide-with-icon" action="{{url('annonce/annonce_admin')}}" method="POST">
                                    @csrf
                                        <div class="form-group">
                                            <label class="text-label"></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-search"></i> </span>
                                                </div>
                                                <input type="number" class="form-control" id="id_annonce" name="id_annonce" placeholder="Enter le numèro d'annonce" required>
                                            </div>
                                        </div>
                                       
                                       
                                        <button type="submit" class="btn mr-2 btn-primary">Rechercher</button>
                                       
                                    </form>
                                </div>
                            </div>

                
                                           
                                           
                                            
                                           
                   
            </div>
        </div>
  




@endsection