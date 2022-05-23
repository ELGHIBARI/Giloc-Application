<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Annonce;
use App\Models\Voiture;
use App\Models\Moto;
use App\Models\Velo;
use App\Models\Demande;
use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Notifications\DemandeNotification;
use App\Notifications\RefusDemandeNotification;


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

  public function show($id_client, $id_demande)
  {
    $demandes = Demande::with('userAnnonce')->whereHas('userAnnonce', function ($query) {
      $query->where('user_id', '=', Auth::user()->id);
    })->where([['etat_demande', '=', 0], ['client_id', '=', $id_client], ['id', '=', $id_demande]])->get();
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
    $demande=Demande::where('id',$id_demande);
    $client=User::where('id',$demande->client_id);
    return view('send-email',compact(''));
  }
  public function refuse($id_demande, $id_annonce)
  {
    $affected = Demande::where('id', $id_demande)->update(['etat_demande' => -1]);
    $affect = Annonce::where('id', $id_annonce)->update(['etat' => 'activee']);
    $demande=Demande::where('id',$id_demande)->first();
    $annonce=Annonce::where('id',$id_annonce);
    $user=User::where('id',$demande->client_id )->first();
    $annonce=Annonce::where('id',$id_annonce)->first();
    $user->notify(new RefusDemandeNotification($annonce));
    
    return redirect('/demande/index');
  }

  public function store(Request $request)
  {
    $demande = new Demande();
    $demande->date_debut = $request->input('date_debut');
    $demande->date_fin = $request->input('date_fin');
    $demande->prix_total = $request->input('prix_total');
    $demande->etat_demande = 0;
    $demande->client_id = $request->input('id_client');
    $demande->annonce_id = $request->input('id_annonce');
    $demande->save();
    $a=Annonce::where('id',$demande->annonce_id)->first();
    $user=User::where('id',$a->user_id)->first();
    $client=User::where('id',$demande->client_id )->first();
    $user->notify(new DemandeNotification($a,$demande,$client));
    $annonce = Annonce::find($demande->annonce_id)->update(['etat' => 'en attente']);
    return redirect('/home');
  }

  public function mesReservation()
  {
    $annonce_demande = array();
    $demandes = Demande::with('userAnnonce')->where('client_id', 1)->get();
    foreach ($demandes as $demande) {
      $annonces = Annonce::where('id', $demande->annonce_id)->get();
      foreach ($annonces as $annonce) {
        array_push($annonce_demande, array(
          "id" => $annonce->id,
          "titre" => $annonce->titre,
          "date_debut" => $demande->date_debut,
          "date_fin" => $demande->date_fin,
          "etat" => $demande->etat_demande,
        ));
      }
    }
    return view('client.demande', compact('annonce_demande'));
  }
}
