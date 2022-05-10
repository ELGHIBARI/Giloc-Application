<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;

class AnnonceController extends Controller
{
    //
    public function create(){
        return view('partenaire.addannonce');
    }

    public function store(Request $request){
        
        $annonce= new Annonce();
        $annonce->titre=$request->input('titre');
        $annonce->description=$request->input('description');
        $annonce->prix_par_jour=$request->input('prix');
        $annonce->desponibilite="oui";
        $annonce->ville=$request->input('ville');


        $annonce->save();

    }
}
