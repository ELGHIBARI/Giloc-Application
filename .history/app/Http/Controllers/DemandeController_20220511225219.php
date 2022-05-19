<?php

namespace App\Http\Controllers;
use App\Models\Annonce;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DemandeController extends Controller
{
    public function index(){
       $Annonces=Annonce::where('user_id',Auth::user()->id)->get();
      // foreach($demandes as $demande){
        dd($Annonces->demandeAnnonce);

       //}
       return view('partenaire.listedemandes',compact('demandes'));
      }
}
