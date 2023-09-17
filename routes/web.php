<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\CategorieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::controller(ClientController::class)->middleware('auth')->group(function(){
    Route::get('/','indexClient')->name('home');
    Route::get('client','addClient')->name('Client');
    Route::get('delete/client/{id}','deleteClient')->name('deleteClient'); 
    Route::post('save/client','storeClient')->name('clientStore');
});

Route::controller(UserController::class)->prefix('user')->group(function(){
    Route::get('register', "register" )->name("register");
    Route::get('login', "login" )->name("login");
    Route::post('store/register',"store" )->name("storeUser");    
    Route::get('/verifyEmail/{email}', "verify" )->name("verifyEmail");
    Route::post('authentification',"authentification" )->name("authentification");    
    Route::get('/forgot_password', "forgetPassword" )->name("forgetPassword");
    Route::post('forgot_password/post',"relogin" )->name("relogin");   
    Route::get('/change_password/{email}', "verifyEmail" )->name("verify");
    Route::post('/password_change',"modifyPassWord")->name("modifyPassWord");
    Route::get('/verify_email/{email}', "modifyPass" )->name("modifyPass");
    Route::get('logout','logout')->name('logout');

});

Route::controller(VoitureController::class)->middleware('auth')->group(function(){
    Route::get('/voiture','indexVoiture')->name('voiture');
    Route::get('/add/voiture','addVoiture')->name('Voitures');
    Route::post('store/voiture',"storeVoiture" )->name("storeVoiture");    
    Route::get('/show/voiture/{id}','showVoiture')->name('showVoiture');
});

Route::controller(CategorieController::class)->middleware('auth')->group(function(){
    Route::get('/ad/categorie','indexCategorie')->name('categorie');
    Route::post('store/categorie',"storeCategorie")->name('categorieStore');
    Route::get('/edit/categorie/{id}','editCategorie')->name('editCategorie');
    Route::post('/update/categorie/{id}','updateCategorie')->name('updateCategorie');
    Route::get('delete/categorie/{id}','deleteCategorie')->name('deleteCategorie'); 
});

Route::controller(ModelController::class)->middleware('auth')->group(function(){
    Route::get('/add/modele','indexModel')->name('modele');
    Route::post('store/modele',"storeModele")->name('storeModele');
    Route::get('/edit/modele/{id}','editModele')->name('editModele');
    Route::post('/update/modele/{id}','updateModele')->name('updateModele');
    Route::get('delete/modele/{id}','deleteModele')->name('deleteModele'); 
});

Route::controller(MarqueController::class)->middleware('auth')->group(function(){
    Route::get('/add/marque','indexMarque')->name('marque');
    Route::post('store/marque',"storeMarque")->name('storeMarque');
    Route::get('/edit/marque/{id}','editMarque')->name('editMarque');
    Route::post('/update/marque/{id}','updateMarque')->name('updateMarque');
    Route::get('delete/marque/{id}','deleteMarque')->name('deleteMarque'); 
});
