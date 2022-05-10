<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Voiture;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    //
    public function create()
    {   $etat_annonce="nonRemplie";
        return view('partenaire.addannonce',compact('etat_annonce'));
    }
    public function success()
    {   $etat_annonce="Sauvegardee";
        return view('partenaire.addannonce',compact('etat_annonce'));
    }
    public function store(Request $request)
    {
        $type=$request->input('typeVehicule');
        if($type=="voiture"){
            $voiture= new Voiture();
            $voiture->marque=$request->input('marque');
            $voiture->modele=$request->input('modele');
            $voiture->annee_modele=$request->input('modeleAnnee');
            $voiture->Type_carburant=$request->input('typeCarburant');
            $voiture->Puissance_fiscale=$request->input('puissance');
            $voiture->nombres_places=$request->input('nbrplace');


        }
        if($type=="moto"){

        }
        if($type=="velo"){

        }       

        $annonce = new Annonce();
        $annonce->prix_par_jour = $request->input('prix');
        $annonce->date_desponibilite = $request->input('date');
        $annonce->ville = $request->input('ville');
        $annonce->premium = $request->input('typeAnnonce');
        if ($request->input('typeAnnonce') == "oui") {
            $annonce->premium = 1;
            $annonce->duree_premium = $request->input('dureePremium');
        } else{ 
            $annonce->premium = 0;
            $annonce->duree_premium ="sans";
        }
        $annonce->titre = $request->input('titre');
        $annonce->description = $request->input('description');
        $annonce->disponible = 1;
        $annonce->etat = 'activee';
        $annonce->user_id =Auth::user()->id;
        $annonce->type_vehicule =$request->input('typeVehicule');

        $annonce->save();
        return redirect('/home');
    }
}
