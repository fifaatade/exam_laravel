<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Modele;
use App\Models\Voiture;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoitureController extends Controller
{
    public function indexVoiture(){
        $user=Auth::user();
        $nom = $user?$user->nom:"";
        $prenom = $user?$user->prenom:"";
        $marque=Marque::all();
        $modele=Modele::all();
        $categorie=Categorie::all();
        $voiture=Voiture::all();
        return view('Voiture.voiture', compact( 'nom','prenom','marque','modele','categorie','voiture'));
    }
    public function addVoiture($id=null){
        $user=Auth::user();
        $nom = $user?$user->nom:"";
        $prenom = $user?$user->prenom:"";
        $marque=Marque::all();
        $modele=Modele::all();
        $categorie=Categorie::all();
        $voiture=Voiture::all();
        return view('Voiture.addVoiture', compact( 'nom','prenom','marque','modele','categorie','voiture'));
    }
    public function storeVoiture( Request $request){
        $data=$request->all();

        $validation =$request->validate([
            "nom_voiture" => "required",
            "boite_vitesse" =>"required",
            "puissance"=>"required",
            "nbre_porte"=>"required",
            "carburant"=>"required",
            "nbre_cylindre"=>"required",
            "soupape"=>"required",
            "vitesse_max"=>"required",
            "frein"=>"required",
            "acceleration"=>"required",
            "couleur"=>"required",
            "image_principale"=>"required|mimes:jpg,jpeg,png",
            "image_2"=>"required|mimes:jpg,jpeg,png",
            "image_3"=>"required|mimes:jpg,jpeg,png",
            "modele_id"=>"required",
            "id_categorie"=>"required",
            "id_marque"=>"required",
           ]);
           $file=$request->file('image_principale');
           $file2=$request->file('image_2');
           $file3=$request->file('image_3');
           if($request->hasFile("image_principale")){
               $images1=$file->store('imagesClient');
           }   
           if($request->hasFile("image_2")){
               $images2=$file2->store('imagesClient');
           }
           if($request->hasFile("image_3")){
            $images3=$file3->store('imagesClient');
            }
        $save=Voiture::create([
            'nom_voiture'=>$data['nom_voiture'],
            'boite_vitesse'=>$data['boite_vitesse'],
            'puissance'=>$data['puissance'],
            'nbre_porte'=>$data['nbre_porte'],
            'carburant'=>$data['carburant'],
            'nbre_cylindre'=>$data['nbre_cylindre'],
            'soupape'=>$data['soupape'],
            'vitesse_max'=>$data['vitesse_max'],
            'frein'=>$data['frein'],
            'acceleration'=>$data['acceleration'],
            'couleur'=>$data['couleur'],
            'image_principale'=>$images1,
            'image_2'=>$images2,
            'image_3'=>$images3,
            'modele_id'=>$data['modele_id'],
            'id_categorie'=>$data['id_categorie'],
            "id_marque"=>$data['id_marque'],
        ]);
        return redirect()->route('voiture')->with('success','nouvelle voiture sauvegarder avec succès');
    }
    public function showVoiture($id=null)
    {
        $user=Auth::user();
        $nom = $user?$user->nom:"";
        $prenom = $user?$user->prenom:"";
        $voiture=Voiture::find($id);
        $ids=idsDB();
        if($voiture && in_array($voiture->id,$ids)){
            return view('Voiture.show', compact('voiture','id','nom','prenom'));
        }
        else{
            return view('Voiture.voiture');
        }
    }
}
