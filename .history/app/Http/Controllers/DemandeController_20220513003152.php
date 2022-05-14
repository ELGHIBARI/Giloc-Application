<?php

namespace App\Http\Controllers;
use App\Models\Annonce;
use App\Models\Voiture;
use App\Models\Moto;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DemandeController extends Controller
{
    public function index(){
        $Annonces=Annonce::with('demandeAnnonce')->where('user_id',Auth::user()->id)->get();
       return view('partenaire.listedemandes',compact('Annonces'));
      }

      public function show($id){
        $Annonces=Annonce::with('demandeAnnonce')->where([['user_id',Auth::user()->id],['id',$id]])->get();
        foreach($Annonces as $annonce){
          if($annonce->type_vehicule=="voiture"){
            $motos=Moto::where('id',$annonce->vehicule_id)->get();
            $voitures=Voiture::where('id',$annonce->vehicule_id);
            foreach($voitures as $voiture){
              dd($voiture->toArray());
            }
          }
          if($annonce->type_vehicule=="moto"){
            echo 'hereeeeeeeee';
            $motos=Moto::where('id',$annonce->vehicule_id)->get();
            foreach($motos as $moto){
              dd($moto->toArray());
            }
          }

        }
        //return view('partenaire.listedemandes',compact('Annonces'));
      }
    }

        // dd($Annonces->demande_annonce->toArray());
      // $demandes=$Annonces->toArray();
    /*   foreach($v as $c){
           echo $c['titre']; echo ' ';
           foreach($c['demande_annonce'] as $b)
           echo $b['prix_total'];
       }*/