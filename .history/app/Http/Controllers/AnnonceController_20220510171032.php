<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    //
    public function create()
    {
        return view('partenaire.addannonce');
    }

    public function store(Request $request)
    {

        $annonce = new Annonce();
        $annonce->prix_par_jour = $request->input('prix');
        $annonce->date_desponibilite = $request->input('date');
        $annonce->ville = $request->input('ville');
        $annonce->premium = $request->input('typeAnnonce');
        if ($request->input('typeAnnonce') == "oui") {
            $annonce->premium = "oui";
            $annonce->duree_premium = $request->input('dureePremium');
        } else{ 
            $annonce->premium = "non";
            $annonce->duree_premium ="sans";
        }
        $annonce->titre = $request->input('titre');
        $annonce->description = $request->input('description');
        $annonce->disponible = $request->input('oui');
        $annonce->etat = $request->input('activee');
        $annonce->user_id =Auth::user()->id;

        $annonce->save();
        echo 'hello';
    }
}
