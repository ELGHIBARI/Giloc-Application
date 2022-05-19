<?php

namespace App\Http\Controllers;
use App\Models\Annonce;
use App\Models\Voiture;
use App\Models\Moto;
use App\Models\Velo;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\ErrorHandler\Debug;
use FacadesDB;
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

      public function show($id_annonce,$id_client){
        $Annonces=Annonce::with('demandeAnnonce')->where([['user_id',Auth::user()->id],['id',$id_annonce],['client_id',$id_client,]])->get();
        $Ann=Annonce::select(DB::Raw('annonces.processed'))
                      ->join('annonces','demandes.annonce_id','=','annonces.id')
                      ->where('annonces.id',$id_annonce)
                      ->where('demandes.client_id',$id_client)
                      ->get();
        $images=null;
        foreach($Annonces as $annonce){
          if($annonce->type_vehicule=="voiture"){ 
            $vehicules=Voiture::where('id',$annonce->vehicule_id)->get();
              foreach($vehicules as $vehicule){ 
              $imageBD=$vehicule->images_voiture;
              $images = explode('|',$imageBD);}
          }
          if($annonce->type_vehicule=="moto"){
             $vehicules=Moto::where('id',$annonce->vehicule_id)->get();
             foreach($vehicules as $vehicule){ 
              $imageBD=$vehicule->images_moto;
              $images = explode('|',$imageBD);}
            }
            
          if($annonce->type_vehicule=="velo"){ 
              $vehicules=Velo::where('id',$annonce->vehicule_id)->get();
              foreach($vehicules as $vehicule){ 
                $imageBD=$vehicule->images_velo;
                $images = explode('|',$imageBD);}
          }
        }
        return view('partenaire.DemandeDetails',compact('Annonces','vehicules','images'));
      }

      public function accept($id_demande,$id_annonce){
        $affected=Demande::where('id', $id_demande,)->update(['etat_demande' => 1]);
      }
      public function refuse($id){
        
      }
    }

