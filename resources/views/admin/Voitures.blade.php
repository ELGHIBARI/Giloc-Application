@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{asset('admin')}}/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<style>
        body{
            background-color: #575F79;
        }
        .cardcolor {
            background-color: #2c2b02;
            background-image: linear-gradient(120deg, #ffb700, #fad4d4);
        }
   
    .btn-sm {
        background-color:#F9810A;
    }
    </style>
<div>
<div class="container">
    <div class="row">
  
                   <div class="col-lg-12">
                       <strong><font color=#F9810A style="float:left;"> <h6>Les Annonces</h6></strong></font> 
                            
                            <div class="card-body">
                                <div class="basic-form">
                                    <form class="form-valide-with-icon" action="{{route('voitures.index')}}" method="GET">
                                        <div class="form-group">
                                            <label class="text-label"></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-search"></i> </span>
                                                </div>
                                                <select class="form-control default-select" name="type_vehicule">
                                                                        
                                                                        <option value="voiture" >Voiture</option>
                                                                        <option value="velo" >Vélo</option>
                                                                        <option value="moto" >Moto</option>
                                                                    </select>
                                            </div>
                                        </div>
                                       
                                       
                                        <button type="submit" class="btn mr-2 btn-primary">Rechercher</button>
                                       
                                    </form>
                                </div>
                            </div>
                        



    <br>
    <br>

    
    <div class="card mb-4 cardcolor">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                              <strong><font> Les voitures</strong></font>
                            </div>
                    <div class="card-body">
                    @if (session()->has('message'))
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif
                        
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>marque</th>
                                    <th>modele</th>
                                    <th>anne_modele</th>
                                    <th>Type_de_carburant</th>
                                    <th>Puissance_fiscale</th>
                                    <th>nombre_places</th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    @foreach ($voitures as $voiture)
                                        <tr>
                                            <td>{{ $voiture->id }}</td>
                                            <td>{{ $voiture->marque }}</td>
                                            <td>{{ $voiture->modele }}</td>
                                            <td>{{ $voiture->annee_modele }}</td>
                                            <td>{{ $voiture->Type_carburant }}</td>
                                            <td>{{ $voiture->Puissance_fiscale }}</td>
                                            <td>{{ $voiture->nombre_places }}</td>
                                            
                                            <td>
                                                <a href="{{route('voitures.view',$voiture->id)}}">  <i class="far fa-eye"></i></a>
                                                <a  href="{{ route('voitures.edit',$voiture->id)}}"><i class="far fa-edit"></i></a>
                                                
                                            </td>
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
<script src="{{asset('admin')}}/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('admin')}}/assets/demo/chart-area-demo.js"></script>
        <script src="{{asset('admin')}}/assets/demo/chart-bar-demo.js"></script>
        <script src="{{asset('admin')}}/assets/demo/chart-pie-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('admin')}}/js/datatables-simple-demo.js"></script>
@endsection