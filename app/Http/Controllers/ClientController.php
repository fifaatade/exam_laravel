<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function indexClient(){
        $user=Auth::user();
        $nom = $user?$user->nom:"";
        $prenom = $user?$user->prenom:"";
        $client_list=$user->client()->paginate(3);
        return view('Client.client', compact( 'nom','prenom','client_list'));
    }
    public function addClient($id=null){
        $user=Auth::user();
        $nom = $user?$user->nom:"";
        $prenom = $user?$user->prenom:"";
        return view('Client.addClient', compact( 'nom','prenom'));
    }
    public function storeClient( Request $request){
        $data=$request->all();

        $validation =$request->validate([
            "nom" => "required",
            "prenom" =>"required",
            "tel"=>"required",
            "adresse"=>"required",
            "photo"=>"required|mimes:jpg,jpeg,png",
            "cni"=>"required",
            "email"=>"required",
           ]);
           $file=$request->file('photo');
   
           if($request->hasFile("photo")){
               $images=$file->store('imagesClient');
           }
        $save=Client::create([
            'nom'=>$data['nom'],
            'prenom'=>$data['prenom'],
            'tel'=>$data['tel'],
            'adresse'=>$data['adresse'],
            'photo'=>$images,
            'cni'=>$data['cni'],
            'email'=>$data['email'],
            'id_user'=>Auth::user()->id
        ]);
        return redirect()->route('home')->with('success','nouveau client sauvegarder avec succès');
    }
    public function deleteClient($id)
    {
        Client::where('id',$id)->delete();
        return redirect()->route('home');
    }
}
