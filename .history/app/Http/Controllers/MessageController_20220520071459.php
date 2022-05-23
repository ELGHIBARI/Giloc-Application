<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;
use App\Notifications\MessageNotification;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
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
    public function getAjax(Request $request)
    {   $message=new Message();
        
        $message->contenu=$request->msg;
        $message->conversation_id=$request->id;
        $conversation=Conversation::where('id',$message->conversation_id)->first();
        $annonce=Annonce::where('id',$conversation->annonce_id)->first();
        $message->receiver_id=$request->id_receiver;
        $message->sender_id=Auth::user()->id;
        $message->save();
        $user=User::where('id',$message->receiver_id)->first();
        $sender=User::where('id',Auth::user()->id)->first();
        if($sender->role="partenaire"){ 
            if($annonce->type_vehicule=="moto")
            $url='annonces/moto_details/'.$annonce->id;
            if($annonce->type_vehicule=="voiture")
            $url='annonces/voiture_details/'.$annonce->id;
            if($annonce->type_vehicule=="velo")
            $url='annonces/velo_details/'.$annonce->id;
        }
        else{
            $url='annonce/'.$annonce->id;
        }
        $user->notify(new MessageNotification($message->contenu,$sender,$annonce,$url));
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
