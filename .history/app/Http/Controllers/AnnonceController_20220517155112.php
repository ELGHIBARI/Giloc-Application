<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Voiture;
use App\Models\Moto;
use App\Models\Velo;
use App\Models\Conversation;
use App\Models\Demande;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    //
    public function create()
    {
        return view('partenaire.addannonce');
        $nbrAnnonce=Annonce::where('user_id',Auth::user()->id)->count();
        dd($nbrAnnonce);
    }

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
                $motos = Moto::where('id',  $annonce->vehicule_id)->get();
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
    {   // récupérer les conversations
        $conversations = Conversation::with('userConversation', 'messages')->where([['partenaire_id', Auth::user()->id], ['annonce_id', $id]])->get();
        // derniers messages
        $lastMessages = array();
        foreach ($conversations as $conversation) {
            $lastMessage = Message::whereRaw('conversation_id=' . $conversation->id . ' and created_at in (select max(created_at) from messages WHERE conversation_id=' . $conversation->id . ')')->get();
            array_push($lastMessages, $lastMessage->toArray());
        }
        $annonces_voiture =  array();
        $voitures = null;
        $annonces_without = Annonce::where('id', $id)->get();
        //$rowCOllection = DB::table('titles')->where('title', 'City')
        //$annonces_without = Annonce::all();
        foreach ($annonces_without as $annonce) {
            if ($annonce->type_vehicule == "voiture") {
                $voitures = Voiture::where('id',  $annonce->vehicule_id)->get();
                foreach ($voitures as $voiture) {
                    $img_p = explode('|', $voiture->images_voiture);
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
        $client=null;
        $demandes = Demande::where([['etat_demande', 0], ['annonce_id', $id]])->get();
        foreach ($demandes as $object) {
            $client = User::where('id', '=', $object->client_id)->get();
        }
        return view('partenaire.annonce_details', ['annonces_voiture' => $annonces_voiture,'demandes'=>$demandes,'client'=>$client, 'conversations' => $conversations, 'lastMessages' => $lastMessages]);
    }
    public function moto_details($id)
    {
         // récupérer les conversations
         $conversations = Conversation::with('userConversation', 'messages')->where([['partenaire_id', Auth::user()->id], ['annonce_id', $id]])->get();
         // derniers messages
         $lastMessages = array();
         foreach ($conversations as $conversation) {
             $lastMessage = Message::whereRaw('conversation_id=' . $conversation->id . ' and created_at in (select max(created_at) from messages WHERE conversation_id=' . $conversation->id . ')')->get();
             array_push($lastMessages, $lastMessage);
         }
        $annonces_moto =  array();
        $voitures = null;


        $annonces_without = Annonce::where('id', $id)->get();
        foreach ($annonces_without as $annonce) {
            if ($annonce->type_vehicule == "moto") {
                $Motos = Moto::where('id',  $annonce->vehicule_id)->get();
                foreach ($Motos as $moto) {
                    $img_p = explode('|', $moto->images_moto);
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
                        "nombre_casques" => $moto->nombre_casques,
                        "Nombre_roues" => $moto->nombre_roues,
                        "images_moto" => $img_p
                    ));
                }
            }
        }
        //$client=null;
       // $demandes = Demande::where([['etat_demande', 0], ['annonce_id', $id]])->get();
        //foreach ($demandes as $object) {
           // $client = User::where('id', '=', $object->client_id)->get();
        //}
        $demandes=Demande::with('userDemande')->where([['etat_demande', 0], ['annonce_id', $id]])->get();

        return view('partenaire.annonce_details', ['annonces_moto' => $annonces_moto, 'demandes' => $demandes,'conversations' => $conversations, 'lastMessages' => $lastMessages]);
    }
    public function velo_details($id)
    {
        $annonces_velo =  array();
         // récupérer les conversations
         $conversations = Conversation::with('userConversation', 'messages')->where([['partenaire_id', Auth::user()->id], ['annonce_id', $id]])->get();
         // derniers messages
         $lastMessages = array();
         foreach ($conversations as $conversation) {
             $lastMessage = Message::whereRaw('conversation_id=' . $conversation->id . ' and created_at in (select max(created_at) from messages WHERE conversation_id=' . $conversation->id . ')')->get();
             array_push($lastMessages, $lastMessage);
         }

        $annonces_without = Annonce::where('id', $id)->get();
        foreach ($annonces_without as $annonce) {
            if ($annonce->type_vehicule == "velo") {
                $velos = Velo::where('id',  $annonce->vehicule_id)->get();
                foreach ($velos as $velo) {
                    $img_p = explode('|', $velo->images_velo);

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
                        "taille" => $velo->taille,
                        "images_velo" => $img_p
                    ));
                }
            }
        }
        $client=null;
        $demandes = Demande::where([['etat_demande', 0], ['annonce_id', $id]])->get();
         //$demandes=Demande::with('userDemadne')->where([['etat_demande', 0], ['annonce_id', $id]])->get();
        foreach ($demandes as $object) {
            $client = User::where('id', '=', $object->client_id)->get();
        }
        return view('partenaire.annonce_details', ['annonces_velo' => $annonces_velo, 'demandes' => $demandes,'client'=>$client, 'conversations' => $conversations, 'lastMessages' => $lastMessages]);
    }
    public function activer_voiture($id)
    {

        $affected = Annonce::where('id', $id)->update(['etat' => 'activee']);

        return $this->voiture_details($id);
    }
    public function archiver_voiture($id)
    {
        $affected = Annonce::where('id', $id)->update(['etat' => 'archivee']);

        return $this->voiture_details($id);
    }
    public function activer_moto($id)
    {

        $affected = Annonce::where('id', $id)->update(['etat' => 'activee']);

        return $this->moto_details($id);
    }
    public function archiver_moto($id)
    {
        $affected = Annonce::where('id', $id)->update(['etat' => 'archivee']);

        return $this->moto_details($id);
    }
    public function activer_velo($id)
    {

        $affected = Annonce::where('id', $id)->update(['etat' => 'activee']);

        return $this->velo_details($id);
    }
    public function archiver_velo($id)
    {
        $affected = Annonce::where('id', $id)->update(['etat' => 'archivee']);

        return $this->velo_details($id);
    }
}
