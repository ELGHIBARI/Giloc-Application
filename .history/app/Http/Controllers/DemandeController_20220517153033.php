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
    $demandes = Demande::whereHas('userAnnonce', function ($query) {
      $query->where('user_id', '=', Auth::user()->id);
    })->where('etat_demande', '=', 0)->get();
    return view('partenaire.listedemandes', compact('demandes'));
  }

  public function show($id_annonce, $id_client,$id_demande)
  {
    $demandes = Demande::with('userAnnonce')->whereHas('userAnnonce', function ($query) {
      $query->where('user_id', '=', Auth::user()->id);
    })->where([['etat_demande', '=', 0], ['client_id', '=', $id_client],['id', '=', $id_demande]])->get();
    $vehicules = null;
    $images = null;
    foreach ($demandes as $demande) {
        if ($demande->userAnnonce->type_vehicule == "voiture") {
          $vehicules = Voiture::where('id', $demande->userAnnonce->vehicule_id)->get();
          foreach ($vehicules as $vehicule) {
            $imageBD = $vehicule->images_voiture;
            $images = explode('|', $imageBD);
          }
        }
        if ($demande->userAnnonce->type_vehicule == "moto") {
          $vehicules = Moto::where('id', $demande->userAnnonce->vehicule_id)->get();
          foreach ($vehicules as $vehicule) {
            $imageBD = $vehicule->images_moto;
            $images = explode('|', $imageBD);
          }
        }

        if ($demande->userAnnonce->type_vehicule == "velo") {
          $vehicules = Velo::where('id', $demande->userAnnonce->vehicule_id)->get();
          foreach ($vehicules as $vehicule) {
            $imageBD = $vehicule->images_velo;
            $images = explode('|', $imageBD);
          }
        }
    }
    return view('partenaire.DemandeDetails', compact('demandes', 'vehicules', 'images'));
  }

  public function accept($id_demande, $id_annonce)
  {
    $affected = Demande::where('id', $id_demande)->update(['etat_demande' => 1]);
    $affect = Annonce::where('id', $id_annonce)->update(['etat' => 'en location']);

    return redirect('/demande/index');
  }
  public function refuse($id_demande,$id_annonce)
  {
    $affected = Demande::where('id', $id_demande)->update(['etat_demande' => -1]);
    $affect = Annonce::where('id', $id_annonce)->update(['etat' => 'en location']);

    return redirect('/demande/index');

  }
}
