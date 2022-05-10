<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    //
    public function create()
    {   $etat_annonce="nonRemplie";
        return view('partenaire.addannonce',compact('etat_annonce'));
    }

    public function store(Request $request)
    {
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
        $etat_annonce="sauvegardee";
        return redirect('/annonce/create')->with(['etat_annonce' =>  $etat_annonce]);
    }
}
