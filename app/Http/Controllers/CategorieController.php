<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{
    public function indexCategorie(){
        $user=Auth::user();
        $nom = $user?$user->nom:"";
        $prenom = $user?$user->prenom:"";
        $categorie_list=Categorie::all();
        return view('Categorie.categorie', compact( 'nom','prenom','categorie_list'));
    }
    public function storeCategorie(Request $request){
        
        $data=$request->all();
        $validation =$request->validate([
            "name" => "required",
           ]);
        $save=Categorie::create([
            'name'=>$data['name'],
        ]);
        return redirect()->route('categorie');
    }
    public function editCategorie($id){
        $user=Auth::user();
        $nom = $user?$user->nom:"";
        $prenom = $user?$user->prenom:"";
        $categorie=Categorie::find($id);
        return view('Categorie.updateCategorie', compact( 'nom','prenom','categorie'));
    }
    public function updateCategorie(Request $request,$id) {
        $data=Categorie::where('id',$id)->first();
        $request->validate([
            "new_nom" => "required",
        ]);
        $data->update([
            'name' => $request->input('new_nom'),
        ]);
        return redirect()->route('categorie');
    }  
    public function deleteCategorie($id)
    {
        Categorie::where('id',$id)->delete();
        return redirect()->route('categorie');
    }
}
