<?php

namespace App\Http\Controllers;
use App\Models\Annonce;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DemandeController extends Controller
{
    public function index(){
       $Annonces=Annonce::with('demandeAnnonce')->where('user_id',Auth::user()->id)->get();
      // foreach($demandes as $demande){
        $Annonces->toArray();
        foreach($Annonces as $a){
            dd($a['demande_annonce']['prix_total']);
        }

       //}
       return view('partenaire.listedemandes',compact('demandes'));
      }
}
