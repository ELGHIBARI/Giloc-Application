<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PartenaireController extends Controller
{
    public function index(){
       
       if(isset($_GET['query'])){
        $txt=$_GET['query'];

        $utilisateur=DB::table('users')->where([['id',$txt],['role','partenaire']])->paginate(2);
    
        return view('admin.Partenaires',['utilisateur'=>$utilisateur]);
       }else{
        return view('admin.Partenaires');

        
    }
}
public function archiver($id)

    {
        $client=User::where('id', $id)->first();
        $annonces=Annonce::where('user_id',$id)->first();
        $annonces->etat='archivee';
        $annonces->save();
        
        $client->etat = 0;
        $client->save();


        return redirect('partenaires')->with('success', 'Data has been deleted.');
    }
}
