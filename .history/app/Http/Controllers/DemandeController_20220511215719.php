<?php

namespace App\Http\Controllers;
use App\Models\Annonce;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DemandeController extends Controller
{
    public function index(){
       $demandes=Demande::all()->userAnnonce()->where('user_id',Auth::user()->id);  
      }
}
