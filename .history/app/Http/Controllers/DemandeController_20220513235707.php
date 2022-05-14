<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Voiture;
use App\Models\Moto;
use App\Models\Velo;
use App\Models\Demande;
use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Symfony\Component\ErrorHandler\Debug;

class DemandeController extends Controller
{
  public function index()
  {
    $Annonces = Demande::with('userDemande')->where('client_id', 2)->get();
    // dd($Annonces->demande_annonce->toArray());
    // $demandes=$Annonces->toArray();
    /*   foreach($v as $c){
           echo $c['titre']; echo ' ';
           foreach($c['demande_annonce'] as $b)
           echo $b['prix_total'];
       }*/
       dd($Annonces);
    return view('partenaire.listedemandes', compact('Annonces'));
  }

  public function show($id_annonce, $id_client)
  {
    $Annonces = Annonce::with('demandeAnnonce')->where([['user_id', Auth::user()->id], ['id', $id_annonce]])->get();
    $Annonce = null;
    $images = null;
    foreach ($Annonces as $annonce) {
      foreach ($annonce->demandeAnnonce as $Demande) {
        if ($Demande->client_id == $id_client) {
          $Annonce = $annonce;
          $demande=$Demande;
          if ($Annonce->type_vehicule == "voiture") {
            $vehicules = Voiture::where('id', $Annonce->vehicule_id)->get();
            foreach ($vehicules as $vehicule) {
              $imageBD = $vehicule->images_voiture;
              $images = explode('|', $imageBD);
            }
          }
          if ($Annonce->type_vehicule == "moto") {
            $vehicules = Moto::where('id', $Annonce->vehicule_id)->get();
            foreach ($vehicules as $vehicule) {
              $imageBD = $vehicule->images_moto;
              $images = explode('|', $imageBD);
            }
          }

          if ($Annonce->type_vehicule == "velo") {
            $vehicules = Velo::where('id', $Annonce->vehicule_id)->get();
            foreach ($vehicules as $vehicule) {
              $imageBD = $vehicule->images_velo;
              $images = explode('|', $imageBD);
            }
          }
        }
      }
    }
    return view('partenaire.DemandeDetails', compact('Annonce','demande', 'vehicules', 'images'));
  }

  public function accept($id_demande, $id_annonce)
  {
    $affected = Demande::where('id', $id_demande,)->update(['etat_demande' => 1]);
    $aff=Demande::where([['annonce_id',$id_annonce],['id','!=',$id_demande]])->update(['etat_demande'=>-1]);
  }
  public function refuse($id)
  {
  }
}