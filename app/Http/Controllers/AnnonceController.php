<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Voiture;
use App\Models\Moto;
use App\Models\Velo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AnnonceController extends Controller
{
    //
    public function create()
    {
        return view('partenaire.addannonce');
    }
    //
    public function index($id)
    {
        $annonces_voiture =  array();
        $annonces_moto =  array();
        $annonces_velo =  array();
        $annonces_with = null;
        $voitures = null;


        $annonces_without = Annonce::where('user_id', $id)->get();
        //$rowCOllection = DB::table('titles')->where('title', 'City')
        //$annonces_without = Annonce::all();
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
                        "date_disponibilite" => $annonce->date_desponibilite,
                        "disponibile" => $annonce->disponibile,
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
                $motos = Moto::where('id',  $annonce->id_vehicule)->get();
                foreach ($motos as $moto) {
                    $img_p = explode('|', $moto->images_moto)[0];
                    array_push($annonces_moto, array(
                        "id" => $annonce->id,
                        "titre" => $annonce->titre,
                        "description" => $annonce->description,
                        "prix_par_jour" => $annonce->prix_par_jour,
                        "date_disponibilite" => $annonce->date_desponibilite,
                        "disponibile" => $annonce->disponibile,
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
                        "date_disponibilite" => $annonce->date_desponibilite,
                        "disponibile" => $annonce->disponibile,
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


        return view('partenaire.annonces', ['annonces_voiture' => $annonces_voiture, 'annonces_moto' => $annonces_moto, 'annonces_velo' => $annonces_velo]);
    }
    public function store(Request $request)
    {
        $type = $request->input('typeVehicule');
        if ($type == "voiture") {
            $voiture = new Voiture();
            $voiture->marque = $request->input('marque');
            $voiture->modele = $request->input('modele');
            $voiture->annee_modele = $request->input('modelAnnee');
            $voiture->Type_carburant = $request->input('typeCarburant');
            $voiture->Puissance_fiscale = $request->input('puissance');
            $voiture->nombre_places = $request->input('nbrplace');
            $voiture->images_voiture = implode('|', $request->file('images'));
            $images = $request->file('images');
            $names = array();
            foreach ($images as $image) {
                $path = $image->getClientOriginalName();
                $name = 'Voiture_partenaire_no_' . Auth::user()->id . '_' . time() . $path;
                $image->move(public_path('images/partenaireUploads/Voitures'), $name);
                array_push($names, $name);
            }
            $voiture->images_voiture = implode('|', $names);
            $voiture->save();
            $id_vehicule = $voiture->id;
        }
        if ($type == "moto") {
            $moto = new Moto();
            $moto->modele = $request->input('modeleMoto');
            $moto->Annee_Modele = $request->input('anneeMoto');
            $moto->Nombre_roues = $request->input('nbrRoues');
            $moto->marque = $request->input('marqueMoto');
            $moto->Cylindree = $request->input('cylindreeMoto');
            $moto->nombre_casques = $request->input('nbrCasque');
            $moto->images_moto = implode('|', $request->file('images'));
            $images = $request->file('images');
            $names = array();
            foreach ($images as $image) {
                $path = $image->getClientOriginalName();
                $name = 'Moto_partenaire_no_' . Auth::user()->id . '_' . time() . $path;
                $image->move(public_path('images/partenaireUploads/Motos'), $name);
                array_push($names, $name);
            }
            $moto->images_moto = implode('|', $names);
            $moto->save();
            $id_vehicule = $moto->id;
        }
        if ($type == "velo") {
            $velo = new Velo();
            $velo->marque = $request->input('marqueVelo');
            $velo->taille = $request->input('tailleVelo');
            $images = $request->file('images');
            $names = array();
            foreach ($images as $image) {
                $path = $image->getClientOriginalName();
                $name = 'velo_partenaire_no' . Auth::user()->id . '_' . time() . $path;
                $image->move(public_path('images/partenaireUploads/Vélos'), $name);
                array_push($names, $name);
            }
            $velo->images_velo = implode('|', $names);
            $velo->save();
            $id_vehicule = $velo->id;
        }
        $annonce = new Annonce();
        $annonce->prix_par_jour = $request->input('prix');
        $annonce->date_desponibilite = $request->input('date');
        $annonce->ville = $request->input('ville');
        $annonce->premium = $request->input('typeAnnonce');
        if ($request->input('typeAnnonce') == "oui") {
            $annonce->premium = 1;
            $annonce->duree_premium = $request->input('dureePremium');
        } else {
            $annonce->premium = 0;
            $annonce->duree_premium = "sans";
        }
        $annonce->titre = $request->input('titre');
        $annonce->description = $request->input('description');
        $annonce->disponible = 1;
        $annonce->etat = 'activee';
        $annonce->user_id = Auth::user()->id;
        $annonce->type_vehicule = $request->input('typeVehicule');
        $annonce->vehicule_id = $id_vehicule;
        $annonce->save();
        return redirect('/home');
    }
    public function voiture_details($id)
    {
        $annonces_voiture =  array();
        $voitures = null;


        $annonces_without = Annonce::where('id', $id)->get();
        //$rowCOllection = DB::table('titles')->where('title', 'City')
        //$annonces_without = Annonce::all();
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
                        "date_disponibilite" => $annonce->date_desponibilite,
                        "disponibile" => $annonce->disponibile,
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
        return view('partenaire.annonce_details', ['annonces_voiture'=>$annonces_voiture]);
    }
    public function moto_details($id)
    {
        return view('partenaire.annonce_details', []);
    }
    public function velo_details($id)
    {
        return view('partenaire.annonce_details', []);
    }
}
