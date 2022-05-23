<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Voiture;
use App\Models\Moto;
use App\Models\Velo;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;


class ProfileController extends Controller
{
    public function index(){
        //$voiture = new Voiture();
       //$voitures = $voiture->get();
 
  $data=annonce::where('user_id',Auth::user()->id)->count();
  $users['users']=User::where('id',Auth::user()->id)->get();
  $disponible=Annonce::where([['user_id',Auth::user()->id],['etat','disponible']])->count();
  $attente=Annonce::where([['user_id',Auth::user()->id],['etat','en_attente']])->count();
  $archive=Annonce::where([['user_id',Auth::user()->id],['etat','archive']])->count();
  $en_location=Annonce::where([['user_id',Auth::user()->id],['etat','en_location']])->count();
        
  
  return view('admin.profile',['data'=>$data,'users'=>$users,'disponible'=>$disponible,'en_location'=>$en_location]);

        

    }



    public function store(Request $request){

        $request->validate([
                'id' => 'required', 
                'nom_complet' => 'required',
                'email' => 'required',
                'numero_telephone' => 'required',
                'ville' => 'required',
                
                'avatar' => 'required',
             
                
            ]);
    	
            $user= Auth::user();

            $user->nom_complet=$request->input('nom_complet');
            $user->email=$request->input('email');
            $user->ville=$request->input('ville');
            $user->numero_telephone=$request->input('numero_telephone');
            $avatar=$request->file('avatar');
            //$user->avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalName();
            $avatar->move(public_path('images/avatar'),$filename);

             $user->avatar = $filename;

             // $user->save();
    		

            return redirect()->route('profile')->with('succes','est  correctement ajoute');
    	}

        public function index1(){
                if(isset($_GET['query'])){
                        $txt=$_GET['query'];
                        $utilisateur=DB::table('users')->where('id','LIKE','%'. $txt .'%')->paginate(2);
                        return view('admin.profiluser',['utilisateur'=>$utilisateur]);
                }else{
            return view('admin.profiluser');

        }}


        public function edit($id){
                $users=User::find($id);
                return view('admin.profiluserEdit',['users' => $users]);
            }

            

            public function update(Request $request){
               
            
                $user=User::where('id',Auth::user()->id)->first();
                
            
                $user->nom_complet =  $request->input('nom_complet');
                $user->email =  $request->input('email');
                $user->numero_telephone = $request->input('numero_telephone');
                $user->ville = $request->input('ville');
                $avatar=$request->file('avatar');
                //$user->avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalName();
                $avatar->move(public_path('images/avatar'),$filename);
                $user->avatar = $filename;
                
            
                 $user->save();
            
                 return redirect()->route('profile')->with('succes','est  correctement ajoute');
            }
           

    	
    
}
