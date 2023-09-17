<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarqueController extends Controller
{
    public function indexMarque(){
        $user=Auth::user();
        $nom = $user?$user->nom:"";
        $prenom = $user?$user->prenom:"";
        $categorie=Categorie::all();
        $marque=Marque::all();
        return view('Marque.marque', compact( 'nom','prenom','categorie','marque'));
    }
   
    public function storeMarque( Request $request){
        $data=$request->all();
        $validation =$request->validate([
            "id_categorie" => "required",
            "name" =>"required",
           ]);
            Marque::updateOrCreate([
                'id_categorie'=>$data['id_categorie'],
                'name'=>$data['name'],
            ]);
        
        return redirect()->route('marque');
    }
    public function editMarque($id){
        $user=Auth::user();
        $nom = $user?$user->nom:"";
        $prenom = $user?$user->prenom:"";
        $categorie=Categorie::all();
        $marque=Marque::find($id);
        return view('Marque.updateMarque', compact( 'nom','prenom','marque','categorie'));
    }

    public function updateMarque(Request $request,$id) {
        $data=Marque::where('id',$id)->first();
        $request->validate([
            "new_nom" => "required",
            "new_categorie"=>"required"
        ]);
        $data->update([
            'name' => $request->input('new_nom'),
            'id_categorie'=>$request->input('new_categorie')
        ]);
        return redirect()->route('marque');
    }  
    public function deleteMarque($id)
    {
        Marque::where('id',$id)->delete();
        return redirect()->route('marque');
    }
}
