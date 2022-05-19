<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Voiture;
use App\Models\Moto;
use App\Models\Velo;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    //
    public function create()
    {   $etat_annonce="nonRemplie";
        return view('partenaire.addannonce',compact('etat_annonce'));
    }
    public function success()
    {   $etat_annonce="Sauvegardee";
        return view('partenaire.addannonce',compact('etat_annonce'));
    }
    public function store(Request $request)
    {
        $type=$request->input('typeVehicule');
        if($type=="voiture"){
            $voiture= new Voiture();
            $voiture->marque=$request->input('marque');
            $voiture->modele=$request->input('modele');
            $voiture->annee_modele=$request->input('modeleAnnee');
            $voiture->Type_carburant=$request->input('typeCarburant');
            $voiture->Puissance_fiscale=$request->input('puissance');
            $voiture->nombres_places=$request->input('nbrplace');
            $voiture->images_voiture=implode('|',$request->input('images'));
            $voiture->save();
            $id_vehicule=$voiture->id;

        }
        if($type=="moto"){
            $moto= new Moto();
            $moto->modele=$request->input('modeleMoto');
            $moto->Annee_Modele=$request->input('anneeMoto');
            $moto->Nombre_roues=$request->input('nbrRoues');
            $moto->marque=$request->input('marqueMoto');
            $moto->Cylindree=$request->input('cylindreeMoto');
            $moto->nombre_casques=$request->input('nbrCasque');
            $moto->images_moto=implode('|',$request->input('images'));
            $moto->save();
            $id_vehicule=$moto->id;

        }
        if($type=="velo"){
            $velo= new Velo();
            $velo->marque=$request->input('marqueVelo');
            $velo->taille=$request->input('tailleVelo');
            $velo->images_vélo=implode('|',$request->input('images'));
            $velo->save();
            $id_vehicule=$velo->id;


        }       
        $target_path = "images/";

        $target_path = $target_path . basename( $_FILES['fichier']['name']);
        $_SESSION['fichier'] = $target_path;
        
        if(move_uploaded_file($_FILES['fichier']['tmp_name'], $target_path)) {
           /* echo "The file ".  basename( $_FILES['fichier']['name']). 
            " has been uploaded";*/
        } else{
            echo "There was an error uploading the file, please try again!";
        }
        $annonce = new Annonce();
        $annonce->prix_par_jour = $request->input('prix');
        $annonce->date_desponibilite = $request->input('date');
        $annonce->ville = $request->input('ville');
        $annonce->premium = $request->input('typeAnnonce');
        if ($request->input('typeAnnonce') == "oui") {
            $annonce->premium = 1;
            $annonce->duree_premium = $request->input('dureePremium');
        } else{ 
            $annonce->premium = 0;
            $annonce->duree_premium ="sans";
        }
        $annonce->titre = $request->input('titre');
        $annonce->description = $request->input('description');
        $annonce->disponible = 1;
        $annonce->etat = 'activee';
        $annonce->user_id =Auth::user()->id;
        $annonce->type_vehicule =$request->input('typeVehicule');

        $annonce->save();
        return redirect('/home');
    }
}
