<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;

class DemandeController extends Controller
{
    public function index(){
      $demande=new Demande();
      $demande::All();
    }
}
