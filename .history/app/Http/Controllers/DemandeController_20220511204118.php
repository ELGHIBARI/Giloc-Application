<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;
use Illuminate\Support\Facades\Auth;

class DemandeController extends Controller
{
    public function index(){
       $demandes= Demande::all()->userAnnonce()->where('id',Auth::user()->id);
       dd($demandes)->toArray();
    }
}
