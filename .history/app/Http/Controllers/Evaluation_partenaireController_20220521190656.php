<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Evaluation_client;
use App\Models\Evaluation_objet;
use App\Models\Evaluation_partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Evaluation_partenaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        //Evaluation des object  
        $rating_objet = Evaluation_objet::with('annonce')->with('user')->where([['client_id', Auth::user()->id]])->orderBy('created_at', 'desc')->get();
        $rating_objet = $rating_objet->toArray();
        // dd($rating_objet);

        //evaluation des partenaires
        $rating_partenaire = Evaluation_partenaire::with('partenaire')->with('annonce')->where([['client_id', Auth::user()->id],['etat', 1]])->orderBy('created_at', 'desc')->get();
        $rating_partenaire = $rating_partenaire->toArray();

        //evaluation des clients
        $rating_client = Evaluation_client::with('partenaire')->where([['client_id', Auth::user()->id],['etat', 1]])->orderBy('created_at', 'desc')->get();
        $rating_client = $rating_client->toArray();
        // dd($rating_client);

        return view('client.Evaluation', ['rating_objet' => $rating_objet, 'rating_client' => $rating_client,'rating_partenaire'=>$rating_partenaire]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id_annonce)
    {
        $rate_objet = Evaluation_objet::where([['annonce_id',$id_annonce],['client_id',Auth::user()->id]])->first();

        $rate_objet->evaluation_etoile = $request->input('rating_objet');
        if($request->input('existe_com_objet')=='on'){
            $rate_objet->commentaire = $request->input('commentaire_objet');
            $rate_objet->type_commentaire = $request->input('type_commentaire_objet');
        }
        else{
            $rate_objet->commentaire = "";
            $rate_objet->type_commentaire = "vide";
        }
            $rate_objet->etat = 1;

            $rate_objet->update();
            
        
        $rate = Evaluation_partenaire::where([['annonce_id',$id_annonce],['client_id',Auth::user()->id]])->first();
        //dd($request->toArray());

        $rate->evaluation_etoile = $request->input('rating_partenaire');
        
        if($request->input('existe_com_partenaire')=='on'){
            $rate->commentaire = $request->input('commentaire_partenaire');
            $rate->type_commentaire = $request->input('type_commentaire_partenaire');
        }
        else{
            $rate->commentaire = "";
            $rate->type_commentaire = "vide";
        }
            $rate->etat = 1;

            $rate->update();
            /////
            $id_partenaire=Annonce::where('id',$id_annonce)->first();
            $monEvaluation=Evaluation_client::where([['partenaire_id',$id_partenaire->user_id],['annonce_id',$id_annonce],['client_id',Auth::user()->id]])->first();
            if($monEvaluation->etat==1){
                $evalObjet = Evaluation_objet::where([['annonce_id', $id_annonce],['client_id',Auth::user()->id]])->update(['etat' => 2]);
                $evalClient = Evaluation_client::where([['annonce_id', $id_annonce],['partenaire_id',$id_partenaire->user_id],['client_id',Auth::user()->id]])->update(['etat' => 2]);
                $evalPartenaire = Evaluation_partenaire::where([['annonce_id', $id_annonce],['partenaire_id',$id_partenaire->user_id],['client_id',Auth::user()->id]])->update(['etat' => 2]);
            }
    

        return redirect()->back()->with('status','Student Updated Successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaluation_client  $evaluation_client
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluation_client $evaluation_client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evaluation_client  $evaluation_client
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluation_client $evaluation_client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evaluation_client  $evaluation_client
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaluation_client  $evaluation_client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluation_client $evaluation_client)
    {
        //
    }
}