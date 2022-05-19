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
        $annonce->titre=$request->input('description');
        $annonce->save();

    }
}
