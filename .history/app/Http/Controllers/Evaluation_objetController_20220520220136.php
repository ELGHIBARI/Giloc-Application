<?php

namespace App\Http\Controllers;

use App\Models\Evaluation_objet;
use App\Models\Annonce;
use App\Models\User;
use App\Models\Evaluation_client;
use App\Models\Evaluation_partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Evaluation_objetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //Evaluation des object  
        $rating_objet = Annonce::with('evaluation')->whereHas('evaluation', function ($q) {
            $q->where('etat', 1);
        })->with('user')->where([['user_id', Auth::user()->id]])->orderBy('created_at', 'desc')->get();
        $rating_objet = $rating_objet->toArray();

        //evaluation des client
        $rating_client = Evaluation_client::with('client')->where([['partenaire_id', Auth::user()->id]])->orderBy('created_at', 'desc')->get();
        $rating_client = $rating_client->toArray();

        //evaluation des partenaires
        $rating_partenaire = Evaluation_partenaire::with('client')->where([['partenaire_id', Auth::user()->id]])->orderBy('created_at', 'desc')->get();
        $rating_partenaire = $rating_partenaire->toArray();

        //dd($rating_client);
        return view('partenaire.Evaluations', ['rating_objet' => $rating_objet, 'rating_client' => $rating_client,'rating_partenaire'=>$rating_partenaire]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
    }
}
