<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Voiture;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function indexLocation(){
        $user=Auth::user();
        $nom = $user?$user->nom:"";
        $prenom = $user?$user->prenom:"";
        $location=Location::all();
        $marque=Marque::all();
        $modele=Modele::all();
        $client=Client::all();
        $voiture=Voiture::all();
        return view('Location.location', compact( 'nom','prenom','location','marque','modele','client','voiture'));
    }
    public function addLocation($id=null){
        $user=Auth::user();
        $nom = $user?$user->nom:"";
        $prenom = $user?$user->prenom:"";
        $marque=Marque::all();
        $modele=Modele::all();
        $client=Client::all();
        $location=Location::all();
        $voiture=Voiture::all();
        return view('Location.addLocation', compact( 'nom','prenom','marque','modele','client','location','voiture'));
    }
    public function storeLocation( Request $request){
        $data=$request->all();

        $validation =$request->validate([
            "date_sortie_voiture"=>"required",
            "date_prevue_retour"=>"required",
            "id_modele"=>"required",
            "id_client"=>"required",
            "id_marque"=>"required",
            "id_voiture"=>"required",
           ]);
        if ($data['date_prevue_retour']>$data['date_sortie_voiture']) {
            $save=Location::create([
                'date_sortie_voiture'=>$data['date_sortie_voiture'],
                'date_prevue_retour'=>$data['date_prevue_retour'],
                'id_modele'=>$data['id_modele'],
                'id_client'=>$data['id_client'],
                'id_voiture'=>$data['id_voiture'],
                'id_marque'=>$data['id_marque'],
                'date_retour_effectif'=>$data['date_prevue_retour'],
                'status'=>1
            ]);
            return redirect()->route('location')->with('success','nouvelle location sauvegarder avec succès');
        }
        else{
            return redirect()->back()->with('errors','les dates ne concorde pas..!');
        }
    }
    public function showLocation($id=null)
    {
        $user=Auth::user();
        $nom = $user?$user->nom:"";
        $prenom = $user?$user->prenom:"";
        $voiture=Voiture::all();
        $location=Location::find($id);
        return view('Location.show', compact('voiture','id','nom','prenom','location'));
    }

    public function addDate(Request $request,$id) {
        $data=Location::where('id',$id)->first();
        $request->validate([
            "new_date_retour_effectif" => "required",
        ]);
        if ($data['date_retour_effectif']>$data['date_prevue_retour']) {
            $data->update([
                'date_retour_effectif' => $request->input('new_date_retour_effectif'),
                'status'=>0,
            ]);
        }
        else{
            $data->update([
                'date_retour_effectif' => $request->input('new_date_retour_effectif'),
                'status'=>1,
            ]);
        }
        return redirect()->route('location');

    } 

}
