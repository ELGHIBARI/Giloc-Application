<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Voiture;
use App\Models\Moto;
use App\Models\Velo;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class ClientController extends Controller
{

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'id' => 'required|unique:voitures', 
            'marque' => 'required',
            'modele' => 'required',
            'annee_modele' => 'required|numeric',
            'Type_de_carburant' => 'required',
            'Puissance_fiscale' => 'required',
            'nombre_places' => 'required|numeric',
        ]);
    }

    public function index(){

       
       if(isset($_GET['query'])){
        $txt=$_GET['query'];
        $utilisateur=User::where([['id',$txt],['role','client']])->get();
        return view('admin.Clients',['utilisateur'=>$utilisateur]);
       }else{
        return view('admin.Clients');

        
    }
}
public function archiver($id)

    {
        $client=User::where('id', $id)->first();
        
        $client->etat = 0;
     
       

        $client->save();


        return redirect('clients')->with('success', 'Data has been deleted.');
    }
}