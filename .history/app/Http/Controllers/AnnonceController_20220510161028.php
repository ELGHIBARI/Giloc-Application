<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;

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
        } else
            $annonce->premium = "non";
        $annonce->titre = $request->input('titre');
        $annonce->premium = $request->input('typeAnnonce');
        $annonce->premium = $request->input('typeAnnonce');
        $annonce->ville = $request->input('ville');
        $annonce->premium = $request->input('typeAnnonce');



        $annonce->save();
    }
}