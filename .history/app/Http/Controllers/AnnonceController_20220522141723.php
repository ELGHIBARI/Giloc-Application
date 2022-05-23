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
use App\Models\Evaluation_client;
use App\Models\Evaluation_partenaire;
use App\Models\Evaluation_objet;

use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    //
    public function create()
    {
        $nbrAnnonce = Annonce::where('user_id', Auth::user()->id)->count();
        if ($nbrAnnonce <= 5) {
            $ok = 1;
            return view('partenaire.addannonce', compact('ok'));
        } else {
            $ok = 0;
            return view('partenaire.addannonce', compact('ok'));
        }
    }

    public function index($id)
    {
        $annonces_voiture =  array();
        $annonces_moto =  array();
        $annonces_velo =  array();
        $annonces_with = null;
        $voitures = null;


        $annonces_without = Annonce::where([['user_id', $id],['etat','!=','archivee']])->get();
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
        $annonce->date_debut = $request->input('date_debut');
        if ($annonce->date_debut == date('Y-m-d'))
            $etat = 'activee';
        else
            $etat = 'archivee';
        $annonce->date_fin = $request->input('date_fin');
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
        $annonce->etat = $etat;
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
        $client = null;
        $demandes = Demande::where([['etat_demande', 0], ['annonce_id', $id]])->get();
        foreach ($demandes as $object) {
            $client = User::where('id', '=', $object->client_id)->get();
        }
        //rating
        $rating = Evaluation_objet::with('client')->where([['annonce_id', $id], ['type_vehicule', 'voiture'],['etat',2]])->orderBy('evaluation_etoile', 'desc')->get();
        $rating = $rating->toArray();
        return view('partenaire.annonce_details', ['annonces_voiture' => $annonces_voiture, 'demandes' => $demandes, 'client' => $client, 'conversations' => $conversations, 'lastMessages' => $lastMessages, 'rating' => $rating]);
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
        $demandes = Demande::with('userDemande')->where([['etat_demande', 0], ['annonce_id', $id]])->get();
        foreach ($demandes as $object) {
            $client = User::where('id', '=', $object->client_id)->get();
        }
        //rating
        $rating = Evaluation_objet::with('client')->where([['annonce_id', $id], ['type_vehicule', 'moto'],['etat',2]])->orderBy('evaluation_etoile', 'desc')->get();
        $rating = $rating->toArray();
        return view('partenaire.annonce_details', ['annonces_moto' => $annonces_moto, 'demandes' => $demandes, 'conversations' => $conversations, 'lastMessages' => $lastMessages, 'rating' => $rating]);
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
                        "taille" => $velo->taille,
                        "images_velo" => $img_p
                    ));
                }
            }
        }
        $client = null;
        $demandes = Demande::where([['etat_demande', 0], ['annonce_id', $id]])->get();
        //$demandes=Demande::with('userDemadne')->where([['etat_demande', 0], ['annonce_id', $id]])->get();
        foreach ($demandes as $object) {
            $client = User::where('id', '=', $object->client_id)->get();
        }
        //rating
        $rating = Evaluation_objet::with('client' )->where([['annonce_id', $id],['type_vehicule','velo'],['etat',2]])->orderBy('evaluation_etoile', 'desc')->get();
        $rating = $rating->toArray();
        return view('partenaire.annonce_details', ['annonces_velo' => $annonces_velo, 'demandes' => $demandes, 'client' => $client, 'conversations' => $conversations, 'lastMessages' => $lastMessages, 'rating' => $rating]);
    }
    public function activer_voiture($id)
    {

        $affected = Annonce::where('id', $id)->update(['etat' => 'activee']);

        return $this->voiture_details($id);
    }
    public function archiver_voiture($id)
    {
        $affected = Annonce::where('id', $id)->update(['etat' => 'Parchivee']);

        return $this->voiture_details($id);
    }
    public function activer_moto($id)
    {

        $affected = Annonce::where('id', $id)->update(['etat' => 'activee']);

        return $this->moto_details($id);
    }
    public function archiver_moto($id)
    {
        $affected = Annonce::where('id', $id)->update(['etat' => 'Parchivee']);

        return $this->moto_details($id);
    }
    public function activer_velo($id)
    {

        $affected = Annonce::where('id', $id)->update(['etat' => 'activee']);

        return $this->velo_details($id);
    }
    public function archiver_velo($id)
    {
        $affected = Annonce::where('id', $id)->update(['etat' => 'Parchivee']);

        return $this->velo_details($id);
    }

    public function showDeltails($id_annonce)
    {
        // récupérer les conversations
        $conversation = Conversation::with('PartenaireConversation', 'messages')->where([['client_id', Auth::user()->id], ['annonce_id', $id_annonce]],)->first();
        // derniers messages
        if ($conversation == null) {
            $conversation = new Conversation();
            $conversation->annonce_id = $id_annonce;
            $conversation->client_id = Auth::user()->id;
            $a = Annonce::where('id', $id_annonce)->first();
            $conversation->partenaire_id = $a->user_id;
            $conversation->save();
        }
        $lastMessage = Message::whereRaw('conversation_id=' . $conversation->id . ' and  created_at in (select max(created_at) from messages WHERE conversation_id=' . $conversation->id . ')')->first();
        $annonces = Annonce::with('Evaluation')->withCount('Evaluation')->where('id', $id_annonce)->get();        // dd($annonces);
        $vehicules = null;
        $images = null;
        foreach ($annonces as $annonce) {
            if ($annonce->type_vehicule == "voiture") {

                $vehicules = Voiture::where('id', $annonce->vehicule_id)->get();
                foreach ($vehicules as $vehicule) {
                    $imageBD = $vehicule->images_voiture;
                    $images = explode('|', $imageBD);
                }
            }
            if ($annonce->type_vehicule == "moto") {
                $vehicules = Moto::where('id', $annonce->vehicule_id)->get();
                foreach ($vehicules as $vehicule) {
                    $imageBD = $vehicule->images_moto;
                    $images = explode('|', $imageBD);
                }
            }

            if ($annonce->type_vehicule == "velo") {
                $vehicules = Velo::where('id', $annonce->vehicule_id)->get();
                foreach ($vehicules as $vehicule) {
                    $imageBD = $vehicule->images_velo;
                    $images = explode('|', $imageBD);
                }
            }
        }
        return view('annonces.show', compact('annonces', 'vehicules', 'images', 'conversation', 'lastMessage'));
    }
    public function reserver($id_annonce, $id_client, $vehicule, $modele, $date_debut, $date_fin, $prix)
    {
        $annonces = Annonce::where('id', $id_annonce)->get();
        foreach ($annonces as $annonce) {
            $type_vehicule =  $annonce->type_vehicule;
        }
        $id = $id_annonce;
        $id_c = $id_client;
        $model = $modele;
        $vehicul = $vehicule;
        $date_debut = $date_debut;
        $date_fin = $date_fin;

        return view('annonces.reserver', compact('type_vehicule', 'id', 'id_c', 'vehicul', 'model', 'date_debut', 'date_fin', 'prix'));
    }




    //les details des vehicules 
    public function evaluation_voiture($id)
    {
        $annonces_voiture =  array();


        $annonces_without = Annonce::where('id', $id)->get();
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

        //rating
        $rating = Evaluation_objet::with('client')->where([['annonce_id', $id], ['type_vehicule', 'voiture'],['etat',2]])->orderBy('evaluation_etoile', 'desc')->get();
        //$rating = Evaluation_objet::where([['annonce_id', $id]])->get();
        $rating = $rating->toArray();
        //dd($rating);
        //-------        
        return view('partenaire.annonce_commentaire', ['annonces_voiture' => $annonces_voiture,  'rating' => $rating]);
    }
    public function evaluation_moto($id)
    {
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
        $demandes = Demande::where([['etat_demande', 0], ['annonce_id', $id]])->get();
        foreach ($demandes as $object) {
            $client = User::where('id', '=', $object->client_id)->get();
        }
        $conversations = array();
        $client = null;
        $conv = Conversation::where([['annonce_id', $id]])->get();
        foreach ($conv as $object) {

            $client = User::where('id', '=', $object->client_id)->get();
            foreach ($client as $c) {
                array_push($conversations, ['id' => $object->id, 'ville' => $c->ville, 'nom' => $c->nom_complet]);
            }
        }
        //rating
        $rating = Evaluation_objet::with('client')->where([['annonce_id', $id], ['type_vehicule', 'moto'],['etat',2]])->orderBy('evaluation_etoile', 'desc')->get();
        $rating = $rating->toArray();
        //-------        
        return view('partenaire.annonce_commentaire', ['annonces_moto' => $annonces_moto, 'demandes' => $demandes, 'client' => $client, 'conversations' => $conversations, 'rating' => $rating]);
    }
    public function evaluation_velo($id)
    {
        $annonces_velo =  array();


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
        //le demande
        $demandes = Demande::where([['etat_demande', 0], ['annonce_id', $id]])->get();
        foreach ($demandes as $object) {
            $client = User::where('id', '=', $object->client_id)->get();
        }
        //les conversations
        $conversations = array();
        $client = null;
        $conv = Conversation::where([['annonce_id', $id]])->get();
        foreach ($conv as $object) {
            $client = User::where('id', '=', $object->client_id)->get();
            foreach ($client as $c) {
                array_push($conversations, ['id' => $object->id, 'ville' => $c->ville, 'nom' => $c->nom_complet]);
            }
        }
        //rating
        $rating = Evaluation_objet::with('client')->where([['annonce_id', $id], ['type_vehicule', 'velo'],['etat',2]])->orderBy('evaluation_etoile', 'desc')->get();
        $rating = $rating->toArray();
        //-------
        return view('partenaire.annonce_commentaire', ['annonces_velo' => $annonces_velo, 'demandes' => $demandes, 'client' => $client, 'conversations' => $conversations, 'rating' => $rating]);
    }
    public function AnnonceArchiver($id)
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
            if($annonce->etat=="archivee"){
            
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
                        "date_debut" => $annonce->date_debut,
                        "date_fin" => $annonce->date_fin,                        
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
        }


        return view('partenaire.Archiver', ['annonces_voiture' => $annonces_voiture, 'annonces_moto' => $annonces_moto, 'annonces_velo' => $annonces_velo]);
    }
}
