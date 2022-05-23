@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin-assets/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/summernote/summernote-bs4.min.css')}}">
<style>
        
   
   
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
                                    <form class="form-valide-with-icon" action="{{route('annonce')}}" method="GET">
                                        <div class="form-group">
                                            <label class="text-label"></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-search"></i> </span>
                                                </div>
                                                <select class="form-control default-select" name="type_vehicule">
                                                                        
                                                                        <option value="tetouan" >Voiture</option>
                                                                        <option value="tanger" >Vélo</option>
                                                                        <option value="rabat" >Moto</option>
                                                                    </select>
                                            </div>
                                        </div>
                                       
                                       
                                        <button type="submit" class="btn mr-2 btn-primary">Rechercher</button>
                                       
                                    </form>
                                </div>
                            </div>
                        



    <br>
    <br>

    @if(isset($annonces))
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6 style="float: left;"><strong><font color=#F9810A>LES Vélos</strong></font></h6>
                    <a class="btn btn-sm" style="float: right; " href="{{route('voitures.create')}}" >Ajouter</a>
                    <div class="card-body">
                    @if (session()->has('message'))
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif
                        
                        <table class="table table-hover" style="float: left;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>marque</th>
                                    <th>Taille</th>
                                   
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($velos->count() > 0)
                                    @foreach ($velos as $velo)
                                        <tr>
                                            <td>{{ $velo->id }}</td>
                                            <td>{{ $velo->marque }}</td>
                                            <td>{{ $velo->modele }}</td>
                                           
                                            
                                            <td>
                                                <a href="{{route('voitures.view',$voiture->id)}}">  <i class="far fa-eye"></i></a>
                                                <a  href="{{ route('voitures.edit',$voiture->id)}}"><i class="far fa-edit"></i></a>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" style="text-align: center;"><small>No voiture Found</small></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>
</div>
@endsection