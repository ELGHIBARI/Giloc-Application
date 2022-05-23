<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Moto;
use App\Models\Velo;
use App\Models\Voiture;
use App\Models\Demande;
use App\Models\Evaluation_client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function landingPage()
    {

        $annonces_voiture =  array();
        $annonces_moto =  array();
        $annonces_velo =  array();
        $annonces_without = null;
        $voitures = null;

        $annonces_without = Annonce::all();
        //dd($annonces_without);

        foreach ($annonces_without as $annonce) {
            if ($annonce->date_fin <= date('Y-m-d')) {
                (new HomeController)->updateAnnonce($annonce->id);
            }
            if ($annonce->date_debut <= date('Y-m-d') && $annonce->date_fin >= date('Y-m-d') && $annonce->etat == "archivee") {
                (new HomeController)->reactiverAnnonce($annonce->id);
            }
            if ($annonce->premium == 1 && date('d-m-Y', strtotime($annonce->date_debut . ' + ' . '7' . ' days')) <= date('Y-m-d')) {
                (new HomeController)->reactiverAnnonce($annonce->id);
                $annonce->premium = 0;
                $annonce->save();
            } else if ($annonce->premium == 1 && $annonce->etat == "activee") {
                if ($annonce->type_vehicule == "voiture") {
                    $voitures = Voiture::where('id',  $annonce->vehicule_id)->get();
                    foreach ($voitures as $voiture) {
                        $img_p = explode('|', $voiture->images_voiture)[0];
                        array_push($annonces_voiture, array(
                            "id" => $annonce->id,
                            "titre" => $annonce->titre,
                            "description" => $annonce->description,
                            "prix_par_jour" => $annonce->prix_par_jour,
                            "date_debut" => $annonce->date_debut,
                            "date_fin" => $annonce->date_fin,
                            "etat" => $annonce->etat,
                            "ville" => $annonce->ville,
                            "duree_premium" => $annonce->duree_premium,
                            "etat" => $annonce->etat,
                            "vehicule_id" => $annonce->vehicule_id,
                            "type_vehicule" => $annonce->type_vehicule,
                            "premium" => $annonce->premium,
                            "marque" => $voiture->marque,
                            "modele" => $voiture->modele,
                            "annee_modele" => $voiture->annee_modele,
                            "Type_carburant" => $voiture->Type_carburant,
                            "Puissance_fiscale" => $voiture->prePuissance_fiscalemium,
                            "nombre_places" => $voiture->nombre_places,
                            "images_voiture" => $img_p
                        ));
                    }
                }
                if ($annonce->type_vehicule  == "moto") {
                    $motos = Moto::where('id',  $annonce->vehicule_id)->get();
                    foreach ($motos as $moto) {
                        $img_p = explode('|', $moto->images_moto)[0];
                        array_push($annonces_moto, array(
                            "id" => $annonce->id,
                            "titre" => $annonce->titre,
                            "description" => $annonce->description,
                            "prix_par_jour" => $annonce->prix_par_jour,
                            "date_debut" => $annonce->date_debut,
                            "date_fin" => $annonce->date_fin,
                            "etat" => $annonce->etat,
                            "ville" => $annonce->ville,
                            "duree_premium" => $annonce->duree_premium,
                            "etat" => $annonce->etat,
                            "vehicule_id" => $annonce->vehicule_id,
                            "type_vehicule" => $annonce->type_vehicule,
                            "premium" => $annonce->premium,
                            "marque" => $moto->marque,
                            "modele" => $moto->modele,
                            "Annee_Modele" => $moto->annee_modele,
                            "Cylindree" => $moto->prePuissance_fiscalemium,
                            "nombre_casques" => $moto->nombre_places,
                            "Nombre_roues" => $moto->nombre_places,
                            "images_moto" => $img_p
                        ));
                    }
                }
                if ($annonce->type_vehicule  == "velo") {
                    $velos = Velo::where('id',  $annonce->vehicule_id)->get();
                    foreach ($velos as $velo) {
                        $img_p = explode('|', $velo->images_velo)[0];
                        array_push($annonces_velo, array(
                            "id" => $annonce->id,
                            "titre" => $annonce->titre,
                            "description" => $annonce->description,
                            "prix_par_jour" => $annonce->prix_par_jour,
                            "date_debut" => $annonce->date_debut,
                            "date_fin" => $annonce->date_fin,
                            "etat" => $annonce->etat,
                            "ville" => $annonce->ville,
                            "duree_premium" => $annonce->duree_premium,
                            "etat" => $annonce->etat,
                            "vehicule_id" => $annonce->vehicule_id,
                            "type_vehicule" => $annonce->type_vehicule,
                            "premium" => $annonce->premium,
                            "marque" => $velo->marque,
                            "taille" => $velo->modele,
                            "images_velo" => $img_p
                        ));
                    }
                }
            }
        }
        return view('acceuil', compact('annonces_voiture', 'annonces_moto', 'annonces_velo'));
    }

    // public function update annonce en fonction de temps
    public function updateAnnonce($id)
    {
        $annonces = Annonce::where('id', $id)->get();
        foreach ($annonces as $annonce) {
            $annonce->etat = "archivee";
            $annonce->save();
        }
    }
    //Reactiver annonce
    public function ReactiverAnnonce($id)
    {

        $annonces = Annonce::where('id', $id)->get();
        foreach ($annonces as $annonce) {
            if ($annonce->etat == "archivee") {
                $annonce->etat = "activee";
                $annonce->save();
            }
        }
    }
    public function index()
    {
        $role = Auth::user()->role;
        if ($role == "admin")
            return view('admin.espaceadmin');
        elseif ($role == "partenaire") {
            $demandes = Demande::whereHas('userAnnonce', function ($query) {
                $query->where('user_id', '=', Auth::user()->id);
              })->where('etat_demande', '=', 1)->get();
              dd($demandes->toArray());
              foreach($demandes as $demande){
                  if($demande->date_fin < date('Y-m-d')){
                    $affected = Demande::where('id', $demande->id)->update(['etat_demande' => 2]);
                     $evaluation_client=new Evaluation_client();
                     $evaluation_client->client_id=$demande->client_id;
                     $evaluation_client->partenaire_id=Auth::user()->id;
                     $evaluation_client->client_id=$demande->client_id;
                     $evaluation_client->client_id=$demande->client_id;
                     $evaluation_client->client_id=$demande->client_id;

                  }
              }

            return view('partenaire.espacepartenaire');
        } else {

            $annonces_voiture =  array();
            $annonces_moto =  array();
            $annonces_velo =  array();
            $annonces_without = null;
            $voitures = null;


            // $annonces_without = Annonce::where('user_id', $id)->get();
            //$rowCOllection = DB::table('titles')->where('title', 'City')
            $annonces_without = Annonce::where([
                'premium' => 1,
                'etat' => 'activee'
            ])->get();
            //dd($annonces_without);
            foreach ($annonces_without as $annonce) {
                if ($annonce->type_vehicule == "voiture") {
                    $voitures = Voiture::where('id',  $annonce->vehicule_id)->get();
                    foreach ($voitures as $voiture) {
                        $img_p = explode('|', $voiture->images_voiture)[0];
                        array_push($annonces_voiture, array(
                            "id" => $annonce->id,
                            "titre" => $annonce->titre,
                            "description" => $annonce->description,
                            "prix_par_jour" => $annonce->prix_par_jour,
                            "date_debut" => $annonce->date_debut,
                            "date_fin" => $annonce->date_fin,
                            "etat" => $annonce->etat,
                            "ville" => $annonce->ville,
                            "duree_premium" => $annonce->duree_premium,
                            "etat" => $annonce->etat,
                            "vehicule_id" => $annonce->vehicule_id,
                            "type_vehicule" => $annonce->type_vehicule,
                            "premium" => $annonce->premium,
                            "marque" => $voiture->marque,
                            "modele" => $voiture->modele,
                            "annee_modele" => $voiture->annee_modele,
                            "Type_carburant" => $voiture->Type_carburant,
                            "Puissance_fiscale" => $voiture->prePuissance_fiscalemium,
                            "nombre_places" => $voiture->nombre_places,
                            "images_voiture" => $img_p
                        ));
                    }
                }
                if ($annonce->type_vehicule  == "moto") {
                    $motos = Moto::where('id',  $annonce->vehicule_id)->get();
                    foreach ($motos as $moto) {
                        $img_p = explode('|', $moto->images_moto)[0];
                        array_push($annonces_moto, array(
                            "id" => $annonce->id,
                            "titre" => $annonce->titre,
                            "description" => $annonce->description,
                            "prix_par_jour" => $annonce->prix_par_jour,
                            "date_debut" => $annonce->date_debut,
                            "date_fin" => $annonce->date_fin,
                            "etat" => $annonce->etat,
                            "ville" => $annonce->ville,
                            "duree_premium" => $annonce->duree_premium,
                            "etat" => $annonce->etat,
                            "vehicule_id" => $annonce->vehicule_id,
                            "type_vehicule" => $annonce->type_vehicule,
                            "premium" => $annonce->premium,
                            "marque" => $moto->marque,
                            "modele" => $moto->modele,
                            "Annee_Modele" => $moto->annee_modele,
                            "Cylindree" => $moto->prePuissance_fiscalemium,
                            "nombre_casques" => $moto->nombre_places,
                            "Nombre_roues" => $moto->nombre_places,
                            "images_moto" => $img_p
                        ));
                    }
                }
                if ($annonce->type_vehicule  == "velo") {
                    $velos = Velo::where('id',  $annonce->vehicule_id)->get();
                    foreach ($velos as $velo) {
                        $img_p = explode('|', $velo->images_velo)[0];
                        array_push($annonces_velo, array(
                            "id" => $annonce->id,
                            "titre" => $annonce->titre,
                            "description" => $annonce->description,
                            "prix_par_jour" => $annonce->prix_par_jour,
                            "date_debut" => $annonce->date_debut,
                            "date_fin" => $annonce->date_fin,
                            "etat" => $annonce->etat,
                            "ville" => $annonce->ville,
                            "duree_premium" => $annonce->duree_premium,
                            "etat" => $annonce->etat,
                            "vehicule_id" => $annonce->vehicule_id,
                            "type_vehicule" => $annonce->type_vehicule,
                            "premium" => $annonce->premium,
                            "marque" => $velo->marque,
                            "taille" => $velo->modele,
                            "images_velo" => $img_p
                        ));
                    }
                }
                // dd($annonces_without);
            }
            // return view('acceuil', ['annonces_voiture' => $annonces_voiture, 'annonces_moto' => $annonces_moto, 'annonces_velo' => $annonces_velo]);
            return view('client.espaceclient', compact('annonces_voiture', 'annonces_moto', 'annonces_velo'));
        }
    }





    //categorie navbar 
    public function showVoiture()
    {
        $annonces_voiture =  array();
        $annonces_moto =  array();
        $annonces_velo =  array();
        $annonces_without = null;
        $voitures = null;
        $annonces_without = Annonce::where('etat', 'activee')->get();
        foreach ($annonces_without as $annonce) {
            if ($annonce->type_vehicule == "voiture") {
                $voitures = Voiture::where('id',  $annonce->vehicule_id)->get();
                foreach ($voitures as $voiture) {
                    $img_p = explode('|', $voiture->images_voiture)[0];
                    array_push($annonces_voiture, array(
                        "id" => $annonce->id,
                        "titre" => $annonce->titre,
                        "description" => $annonce->description,
                        "prix_par_jour" => $annonce->prix_par_jour,
                        "date_debut" => $annonce->date_debut,
                        "date_fin" => $annonce->date_fin,
                        "etat" => $annonce->etat,
                        "ville" => $annonce->ville,
                        "duree_premium" => $annonce->duree_premium,
                        "etat" => $annonce->etat,
                        "vehicule_id" => $annonce->vehicule_id,
                        "type_vehicule" => $annonce->type_vehicule,
                        "premium" => $annonce->premium,
                        "marque" => $voiture->marque,
                        "modele" => $voiture->modele,
                        "annee_modele" => $voiture->annee_modele,
                        "Type_carburant" => $voiture->Type_carburant,
                        "Puissance_fiscale" => $voiture->prePuissance_fiscalemium,
                        "nombre_places" => $voiture->nombre_places,
                        "images_voiture" => $img_p
                    ));
                }
            }
        }

        return view('annonces.voiture', compact('annonces_voiture'));
    }
    public function showVelo()
    {
        $annonces_voiture =  array();
        $annonces_moto =  array();
        $annonces_velo =  array();
        $annonces_without = null;
        $voitures = null;



        $annonces_without = Annonce::where('etat',  'activee')->get();
        foreach ($annonces_without as $annonce) {
            if ($annonce->type_vehicule  == "velo") {
                $velos = Velo::where('id',  $annonce->vehicule_id)->get();
                foreach ($velos as $velo) {
                    $img_p = explode('|', $velo->images_velo)[0];
                    array_push($annonces_velo, array(
                        "id" => $annonce->id,
                        "titre" => $annonce->titre,
                        "description" => $annonce->description,
                        "prix_par_jour" => $annonce->prix_par_jour,
                        "date_debut" => $annonce->date_debut,
                        "date_fin" => $annonce->date_fin,
                        "etat" => $annonce->etat,
                        "ville" => $annonce->ville,
                        "duree_premium" => $annonce->duree_premium,
                        "etat" => $annonce->etat,
                        "vehicule_id" => $annonce->vehicule_id,
                        "type_vehicule" => $annonce->type_vehicule,
                        "premium" => $annonce->premium,
                        "marque" => $velo->marque,
                        "taille" => $velo->modele,
                        "images_velo" => $img_p
                    ));
                }
            }
        }
        return view('annonces.velo', compact('annonces_velo'));
    }

    public function showMoto()
    {

        $annonces_voiture =  array();
        $annonces_moto =  array();
        $annonces_velo =  array();
        $annonces_without = null;
        $voitures = null;

        $annonces_without = Annonce::where('etat',  'activee')->get();
        foreach ($annonces_without as $annonce) {
            if ($annonce->type_vehicule  == "moto") {
                $motos = Moto::where('id',  $annonce->vehicule_id)->get();
                foreach ($motos as $moto) {
                    $img_p = explode('|', $moto->images_moto)[0];
                    array_push($annonces_moto, array(
                        "id" => $annonce->id,
                        "titre" => $annonce->titre,
                        "description" => $annonce->description,
                        "prix_par_jour" => $annonce->prix_par_jour,
                        "date_debut" => $annonce->date_debut,
                        "date_fin" => $annonce->date_fin,
                        "etat" => $annonce->etat,
                        "ville" => $annonce->ville,
                        "duree_premium" => $annonce->duree_premium,
                        "etat" => $annonce->etat,
                        "vehicule_id" => $annonce->vehicule_id,
                        "type_vehicule" => $annonce->type_vehicule,
                        "premium" => $annonce->premium,
                        "marque" => $moto->marque,
                        "modele" => $moto->modele,
                        "Annee_Modele" => $moto->annee_modele,
                        "Cylindree" => $moto->Cylindree,
                        "nombre_casques" => $moto->nombre_casques,
                        "Nombre_roues" => $moto->nombre_roues,
                        "images_moto" => $img_p
                    ));
                }
            }
        }
        return view('annonces.moto', compact('annonces_moto'));
    }


    //code rechercher
    public function rechercherCategorie()
    {
        $rech = $_GET['search'];
        if ($rech == "voiture") {
            return (new HomeController)->showVoiture();
        } else if ($rech == "moto") {
            return (new HomeController)->showMoto();
        } else if ($rech == "vélo") {
            return (new HomeController)->showVelo();
        } else {
            return (new HomeController)->landingPage();
        }
    }

    public function acceuil()
    {
        $annonces_voiture =  array();
        $annonces_moto =  array();
        $annonces_velo =  array();
        $annonces_without = null;
        $voitures = null;


        // $annonces_without = Annonce::where('user_id', $id)->get();
        //$rowCOllection = DB::table('titles')->where('title', 'City')
        $annonces_without = Annonce::where([
            'premium' => 1,
            'etat' => 'activee'
        ])->get();
        //dd($annonces_without);
        foreach ($annonces_without as $annonce) {
            if ($annonce->type_vehicule == "voiture") {
                $voitures = Voiture::where('id',  $annonce->vehicule_id)->get();
                foreach ($voitures as $voiture) {
                    $img_p = explode('|', $voiture->images_voiture)[0];
                    array_push($annonces_voiture, array(
                        "id" => $annonce->id,
                        "titre" => $annonce->titre,
                        "description" => $annonce->description,
                        "prix_par_jour" => $annonce->prix_par_jour,
                        "date_debut" => $annonce->date_debut,
                        "date_fin" => $annonce->date_fin,
                        "etat" => $annonce->etat,
                        "ville" => $annonce->ville,
                        "duree_premium" => $annonce->duree_premium,
                        "etat" => $annonce->etat,
                        "vehicule_id" => $annonce->vehicule_id,
                        "type_vehicule" => $annonce->type_vehicule,
                        "premium" => $annonce->premium,
                        "marque" => $voiture->marque,
                        "modele" => $voiture->modele,
                        "annee_modele" => $voiture->annee_modele,
                        "Type_carburant" => $voiture->Type_carburant,
                        "Puissance_fiscale" => $voiture->prePuissance_fiscalemium,
                        "nombre_places" => $voiture->nombre_places,
                        "images_voiture" => $img_p
                    ));
                }
            }
            if ($annonce->type_vehicule  == "moto") {
                $motos = Moto::where('id',  $annonce->vehicule_id)->get();
                foreach ($motos as $moto) {
                    $img_p = explode('|', $moto->images_moto)[0];
                    array_push($annonces_moto, array(
                        "id" => $annonce->id,
                        "titre" => $annonce->titre,
                        "description" => $annonce->description,
                        "prix_par_jour" => $annonce->prix_par_jour,
                        "date_debut" => $annonce->date_debut,
                        "date_fin" => $annonce->date_fin,
                        "etat" => $annonce->etat,
                        "ville" => $annonce->ville,
                        "duree_premium" => $annonce->duree_premium,
                        "etat" => $annonce->etat,
                        "vehicule_id" => $annonce->vehicule_id,
                        "type_vehicule" => $annonce->type_vehicule,
                        "premium" => $annonce->premium,
                        "marque" => $moto->marque,
                        "modele" => $moto->modele,
                        "Annee_Modele" => $moto->annee_modele,
                        "Cylindree" => $moto->prePuissance_fiscalemium,
                        "nombre_casques" => $moto->nombre_places,
                        "Nombre_roues" => $moto->nombre_places,
                        "images_moto" => $img_p
                    ));
                }
            }
            if ($annonce->type_vehicule  == "velo") {
                $velos = Velo::where('id',  $annonce->vehicule_id)->get();
                foreach ($velos as $velo) {
                    $img_p = explode('|', $velo->images_velo)[0];
                    array_push($annonces_velo, array(
                        "id" => $annonce->id,
                        "titre" => $annonce->titre,
                        "description" => $annonce->description,
                        "prix_par_jour" => $annonce->prix_par_jour,
                        "date_debut" => $annonce->date_debut,
                        "date_fin" => $annonce->date_fin,
                        "etat" => $annonce->etat,
                        "ville" => $annonce->ville,
                        "duree_premium" => $annonce->duree_premium,
                        "etat" => $annonce->etat,
                        "vehicule_id" => $annonce->vehicule_id,
                        "type_vehicule" => $annonce->type_vehicule,
                        "premium" => $annonce->premium,
                        "marque" => $velo->marque,
                        "taille" => $velo->modele,
                        "images_velo" => $img_p
                    ));
                }
            }
        }
    }






}
