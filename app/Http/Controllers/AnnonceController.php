<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    //
    public function create(){
        return view('partenaire.addannonce');
    }
}
