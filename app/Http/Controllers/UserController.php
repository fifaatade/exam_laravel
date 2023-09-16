<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function register(){
        return view('User.register');
    }
    public function login(){
        return view('User.login');
    }
    public function store(Request $request){
        $data=$request->all();

        $validation =$request->validate([
            "nom" =>"required|min:2",
            "prenom" =>"required|min:2",
            "email"=>"required|unique:users|regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/",
            "password"=>"required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#^_;:,])[A-Za-z\d@$!%*?&#^_;:,]{8,}$/|confirmed:password_confirmation",

        ]);

        $save= User::create([
            'nom'=>$data['nom'],
            'prenom'=>$data['prenom'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),

        ]);
        
        $url=URL::temporarySignedRoute(
            'verifyEmail',now()->addMinutes(30),['email'=>$data['email']]
        );

        Mail::send('User.mail',['url'=>$url,'name'=>$data['nom'].' '.$data['prenom']], function($message) use ($data) { 
            $config=config('mail');
            $message->subject('Registration verification !')
                    ->from($config['from']['address'],$config['from']['name'])
                    ->to($data['email'],$data['nom'].''.$data['prenom']);
        });

        return redirect()->back()->with("success",'veuillez consulter votre mail pour activer votre compte utilisateur');
    }
    public function verify(Request $request,$email){
        $user=User::where('email',$email)->first();
        if(!$user){
            abort(404);
        }
        if(!$request->hasValidSignature()){
            abort(404);
        }
        $user->update([
            "email_verified_at"=>now(),
            'email_verified'=>true
        ]);
        return redirect()->route('login')->with('message','compte activé avec success');
    }
    public function authentification(Request $request){
        $user=Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'email_verified'=>true
        ]);
        if($user){
            return redirect()->route('home');
        }
        else{
            return redirect()->back()->with('errors','la correspondance email/password est incorrect!');
        }
    }
    public function forgetPassword() {
        return view('User.forgetPassword');
    }
    public function relogin(Request $request)
        {
        $validation = $request->validate([
            "email" => "required|regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/",
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email invalide!');
        } else {
            $url = URL::temporarySignedRoute(
                "verify",now()->addMinutes(30),['email'=>$user['email']]  
            );

            
            Mail::send('User.emailVerify', ['url' => $url, 'name' => $user->firstname . ' ' . $user->lastname], function ($message) use ($user) {
                $config = config('mail');
                $message->subject('Changer le mot de passe!')
                    ->from($config['from']['address'], $config['from']['name'])
                    ->to($user->email, $user->firstname . ' ' . $user->lastname);
            });

            return redirect()->back()->with("success", 'Veuillez consulter votre e-mail pour changer votre mot de passe');
        }
    }

    public function verifyEmail(Request $request,$email){
        $user=User::where('email',$email)->first();
        if(!$user){
            abort(404);
        }
        if(!$request->hasValidSignature()){
            abort(404);
        }
        session(['userEmail'=>$user->email]);

       return view('User.newLogin');
    }
    public function modifyPassWord(Request $request){
        $email=session('userEmail');
        $data = $request->all();
        $user=User::where('email',$email)->first();
        $validation=$request->validate([
            'new_password'=>"required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#^_;:,])[A-Za-z\d@$!%*?&#^_;:,]{8,}$/|confirmed:new_password_confirmation"
        ]);
        $user->update([
            'password'=>Hash::make($data['new_password'])
        ]);
        return redirect()->route('login');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
