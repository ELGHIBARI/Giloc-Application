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
        $bb=$Annonces->toArray();
        //foreach($Annonces as $a)
         dd($bb['demande_annonce']);

       //}
       return view('partenaire.listedemandes',compact('demandes'));
      }
}