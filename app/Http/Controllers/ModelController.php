<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Modele;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModelController extends Controller
{
    public function indexModel(){
        $user=Auth::user();
        $nom = $user?$user->nom:"";
        $prenom = $user?$user->prenom:"";
        $marque=Marque::all();
        $modele=Modele::all();
        return view('Modele.modele', compact( 'nom','prenom','marque','modele'));
    }
    public function storeModele( Request $request){
        $data=$request->all();
        $validation =$request->validate([
            "id_marque" => "required",
            "modele_name" =>"required",
            "annee" =>"required",
           ]);
            Modele::updateOrCreate([
                'id_marque'=>$data['id_marque'],
                'modele_name'=>$data['modele_name'],
                'annee'=>$data['annee'],
            ]);
        
        return redirect()->route('modele');
    }
    public function editModele($id){
        $user=Auth::user();
        $nom = $user?$user->nom:"";
        $prenom = $user?$user->prenom:"";
        $marque=Marque::all();
        $modele=Modele::find($id);
        return view('Modele.updateModele', compact( 'nom','prenom','marque','modele'));
    }

    public function updateModele(Request $request,$id) {
        $data=Modele::where('id',$id)->first();
        $request->validate([
            "new_nom" => "required",
            "new_year"=>"required",
            "new_marque"=>"required"
        ]);
        $data->update([
            'name' => $request->input('new_nom'),
            'annee'=>$request->input('new_year'),
            'id_marque'=>$request->input('new_marque')
        ]);
        return redirect()->route('modele');
    }  
    public function deleteModele($id)
    {
        Modele::where('id',$id)->delete();
        return redirect()->route('marque');
    }
}
