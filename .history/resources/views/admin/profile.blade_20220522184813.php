@extends('layouts.app')

@section('content')
<!--
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
	<link href="admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="{{asset('admin')}}/vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet">rabab-->
    <link href="admin/css/styles.css" rel="stylesheet">
    <style>
        .parent-div {
  display: inline-block;
  position: relative;
  overflow: hidden;
}
.parent-div input[type=file] {
  left: 0;
  top: 0;
  opacity: 0;
  position: absolute;
  font-size: 90px;
}
.btn-upload {
  background-color: #fff;
  border: 3px #000;
  color: #F7A423;
  
}
    </style>
<div class="container">
<div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                        <figure class="figure">
  <img src="/images/avatar/{{Auth::user()->avatar}}" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
</figure>
                         <!--    <img src="/images/avatar/{{Auth::user()->avatar}}" class="img-fluid" style="height=200px;">-->
                            <div class="profile-head">
                                <div class="photo-content">
                                    
                                </div>
                                <div class="profile-info">
									<div class="profile-photo">
										
									</div>
                                    
									<div class="profile-details">
										<div class="profile-name px-3 pt-2">
											
											<img src="/images/avatar/{{Auth::user()->avatar}}" style="width:150px;height:150px;float:let; border-radius:50%;margin-right: 20px;">
                                            <h4 class="text mb-0">{{ Auth::user()->nom_complet }}</h4>
                                           
										</div>
										<div class="profile-email px-2 pt-2">
											
											<p>{{ Auth::user()->email }}</p>
										</div>
										
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
               
               
                <div class="row">
                   <!--  <div class="col-xl-4">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-body">
										<div class="profile-statistics">
											<div class="text-center">
												<div class="row">
													<div class="col">
														<h3 class="m-b-0">{{$data}}</h3><span>Annonces</span>
													</div>
													<div class="col">
														<h3 class="m-b-0">{{$disponible}}</h3><span>Disponible</span>
													</div>
													<div class="col">
														<h3 class="m-b-0">{{$en_location}}</h3><span>En location</span>
													</div>
												</div>
												
											</div>
									
										</div>
									</div>
								</div>
							</div>
-->
							
							
							
						</div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            
                                            <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link" style="color:orange;">Mes informations</a>
                                            </li>
                                            <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link" style="color:orange;">Paramètre</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                           
                                            <div id="about-me" class="tab-pane fade active show">
                                               <br>
                                               <br>
                                               
                                            @foreach($users as $user)
                                                <div class="">
                                                   <center> <h4 class="text" style="color:orange;">informations personnelles</h4></center>
                                                   <br>
                                                   <dl class="row">
                                                    
                                                
                                                        <dt class="col-sm-3">
                                                            Le nom complet:
                                                            
                                                        </dt>
                                                        <dd class="col-sm-9 "><span>{{Auth::user()->nom_complet}}</span>
                                                        </dd>
                                                        <br>
                                                        <br>
                                                 
                                                   


                                                    
                                                        <dt class="col-sm-3">
                                                            Email:
                                                            
                                                        </dt>
                                                        <dd class="col-sm-9"><span>{{Auth::user()->email}}</span>
                                                        </dd>
                                                        <br>
                                                        <br>
                                                    


                                                   
                                                        <dt class="col-sm-3">
                                                            Numéro de téléphone :
                                                            
                                                        </dt>
                                                        <dd class="col-sm-9"><span>{{Auth::user()->numero_telephone}}</span>
                                                        </dd>
                                                        <br><br>
                                                   


                                                    
                                                        <dt class="col-sm-3">
                                                            ville:
                                                        </dt>
                                                        <dd class="col-sm-9"><span>{{Auth::user()->ville}}</span>
                                                        </dd>
                                                    </dl>
                                                  
                                                    
                                                   
                                                   
                                                    @endforeach
                                       
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <div id="profile-settings" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                      <center> <h4 class="text" style="color:orange;">Editer votre profile</h4></center> 
                                                        <br>
                                                        <form action="{{route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                                          
                                                               @csrf
                                                             @method('PUT')

                                                           




                                                             <div class="form-group row">
                                                                
                                                                    <label for="id" class="col-3" >Photo de profile</label>
                                                                    <div class="col-9">
                                                                    <div class="parent-div">
                                                                        <img width="100" src="{{asset('images/avatar/'.Auth::user()->avatar)}}" style="width:80px;height:80px;float:let; border-radius:50%;margin-right: 20px;"/>
                                                                    <button class="btn-upload">Choisir le fichier</button>
                                                                    <input type="file" placeholder="photo" name="avatar" value="{{Auth::user()->avatar}}" class="form-control" required/>
                                                                      </di>
                                                                    <input type="hidden" name="avatar" value="{{Auth::user()->avatar}}" />
                                                                    
                                                            </div>
</div>
                                            
                                                            <div class="form-group row">
                                                                
                                                                    <label for="id" class="col-3">le nom complet</label>
                                                                    <div class="col-6">
                                                                    <input type="text" name="nom_complet"placeholder="le nom complet" class="form-control" value="{{Auth::user()->nom_complet}}" required>
                                                                  </div>
                                                                
                                                            </div>


                                                            <div class="form-group row">
                                                                <label for="id" class="col-3">Email</label>
                                                                <div class="col-6">
                                                                <input type="email" placeholder="Email" name="email"class="form-control" value="{{Auth::user()->email}}" required>
                                                                </div>
                                                           </div>

                                                           <div class="form-group row">
                                                                <label for="id" class="col-3">Numéro de téléphone</label>
                                                                <div class="col-6">
                                                                <input type="number" placeholder="Numéro de téléphone" name="numero_telephone"class="form-control" value="{{Auth::user()->numero_telephone}}" required>
                                                                </div>
                                                           </div>
                                                            
                                                                <div class="form-group row">
                                                                    <label for="id" class="col-3">Ville</label>
                                                                    <div class="col-6">
                                                                    <select class="form-control default-select" name="ville"value="{{Auth::user()->ville}}" required>
                                                                        
                                                                        <option value="tetouan" >Tétouan</option>
                                                                        <option value="tanger" >Tanger</option>
                                                                        <option value="rabat" >Rabat</option>
                                                                    </select>
                                                                </div>
                                                                </div>
                                                               
                                                                
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                 <button class="btn btn-primary" style="float: right; background-color:#F9810A; border-color:#F9810A; "  type="submit">Valider</button>
                                                            </div>
                                                           
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<!-- Modal -->
									<div class="modal fade" id="replyModal">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Post Reply</h5>
													<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
												</div>
												<div class="modal-body">
													<form>
														<textarea class="form-control" rows="4">Message</textarea>
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
													<button type="button" class="btn btn-primary">Reply</button>
												</div>
											</div>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
       
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
	
	<!--removeIf(production)-->
        
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors 
    
	<script src="{{asset('admin')}}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="{{asset('admin')}}/vendor/lightgallery/js/lightgallery-all.min.js"></script>
    <script src="{{asset('admin')}}/js/custom.min.js"></script>
	<script src="{{asset('admin')}}/js/deznav-init.js"></script>
    <script src="{{asset('admin')}}/js/demo.js"></script>
  -->

@endsection