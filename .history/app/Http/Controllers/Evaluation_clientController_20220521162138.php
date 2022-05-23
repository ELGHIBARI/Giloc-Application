<?php

namespace App\Http\Controllers;

use App\Models\Evaluation_client;
use App\Models\Evaluation_partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Evaluation_clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function update(Request $request, $id,$id_annonce)
    {
        $rate = Evaluation_client::find($id);
        $rate->evaluation_etoile = $request->input('rating');
        if($request->input('existe_com')=='on'){
            $rate->commentaire = $request->input('commentaire');
            $rate->type_commentaire = $request->input('type_commentaire');
        }
        else{
            $rate->commentaire = "";
        $rate->type_commentaire = "vide";
        }
        $rate->etat = 1;
        $monEvaluation=Evaluation_partenaire::where([['partenaire_id',Auth::user()->id],['annonce_id',$id_annonce]])->first();
        $rate->update();
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