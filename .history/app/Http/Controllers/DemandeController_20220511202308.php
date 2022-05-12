<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;

class DemandeController extends Controller
{
    public function index(){
        $id=Auth::user()->id;
        $demandes=Demande::userAnnonce()->where
     
    }
}
