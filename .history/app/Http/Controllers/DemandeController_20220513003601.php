<?php

namespace App\Http\Controllers;
use App\Models\Annonce;
use App\Models\Voiture;
use App\Models\Moto;
use App\Models\Velo;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DemandeController extends Controller
{
    public function index(){
        $Annonces=Annonce::with('demandeAnnonce')->where('user_id',Auth::user()->id)->get();
                // dd($Annonces->demande_annonce->toArray());
      // $demandes=$Annonces->toArray();
      /*   foreach($v as $c){
           echo $c['titre']; echo ' ';
           foreach($c['demande_annonce'] as $b)
           echo $b['prix_total'];
       }*/
       return view('partenaire.listedemandes',compact('Annonces'));
      }

      public function show($id){
        $Annonces=Annonce::with('demandeAnnonce')->where([['user_id',Auth::user()->id],['id',$id]])->get();
        foreach($Annonces as $annonce){
          if($annonce->type_vehicule=="voiture")
            $voitures=Voiture::where('id',$annonce->vehicule_id)->get();
          if($annonce->type_vehicule=="moto")
            $motos=Moto::where('id',$annonce->vehicule_id)->get();
          if($annonce->type_vehicule=="velo")
            $velos=Velo::where('id',$annonce->vehicule_id)->get();
        }
        //return view('partenaire.listedemandes',compact('Annonces'));
      }
    }

