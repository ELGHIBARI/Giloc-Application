@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row"> 
              <div class="col-lg-12">
                       <strong><font color=#F9810A style="float:left;"> <h6>Les utilisateurs</h6></strong></font> 
                            
                            <div class="card-body">
                                <div class="basic-form">
                                    <form class="form-valide-with-icon" action="{{route('partenaires')}}" method="GET">
                                        <div class="form-group">
                                            <label class="text-label"></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-search"></i> </span>
                                                </div>
                                                <input type="number" class="form-control" id="query" name="query" placeholder="Enter le numèro de partenaire" required>
                                            </div>
                                        </div> 
                                        <button type="submit" class="btn mr-2 btn-primary">Rechercher...</button>
                                    </form>
                                </div>
                            </div>
                        </div>



		<br>
		<br>
		<br>
		<br>
        <br>
        <br><br>
        <br>
        <br>

		               @if(isset($utilisateur))
		               
                           

		                        <table class="table table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Numèro de partenaire</th>
                                            <th>Nom complet</th>
                                            <th>Email</th>
											<th>Ville</th>
											<th>Role</th>
											<th>Numéro de téléphone</th>
											<th>Photo de profile</th>
                                            <th>Annonces</th>
											
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    
                                   
                                     @if($utilisateur->count() > 0)
                                            @foreach($utilisateur as $client)
                                            <tr>
                                                <td>{{ $client->id }}</td>
                                                <td>{{ $client->nom_complet }}</td>
                                                <td>{{ $client->email  }}</td>
												<td>{{ $client->ville }}</td>
                                                <td>{{ $client->role }}</td>
                                                <td>{{ $client->numero_telephone}}</td>
                                               
                                                
												<td><img src="/images/avatar/{{$client->avatar}}" style="width:50px;height:50px;float:let; border-radius:50%;margin-right: 20px;"></td>
												<td>{{App\Models\Annonce::where('user_id',$client->id)->count()}}</td>
                                                <td><a onclick="return confirm('confirmer l archivage?')" href="{{url('/partenaires/'.$client->id.'/archiver')}}"><i class="fa fa-archive font-size-15 text-danger"></i></a></td>
												
                                            </tr>
                                            @endforeach
                                          @else
										  <tr><td>aucun partenaire trouvé</td></tr>
                                          @endif
                                
                                    </tbody>
                                </table>

								@endif
								</div>
								</div>
					
							

	                  </div>
							
		</div>
  </div>

							
@endsection