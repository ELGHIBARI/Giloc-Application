<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;
use Illuminate\Support\Facades\Auth;

class DemandeController extends Controller
{
    public function index(){
        $id=Auth::user()->id;
        
    }
}
