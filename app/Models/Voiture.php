<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    //use HasFactory;
    protected $table='voiture';
    protected $fillable=[
        'nom_voiture',
        'boite_vitesse',
        'puissance',
        'nbre_porte',
        'carburant',
        'nbre_cylindre',
        'soupape',
        'vitesse_max',
        'frein',
        'acceleration',
        'couleur',
        'image_principale',
        'image_2',
        'image_3',
        'modele_id'
    ];
    public function locationVoi(){
        return $this->hasMany(Location::class,"id_voiture","id");
    }
    public function modele(){
        return $this->belongsTo(Modele::class,"modele_id","id");
    }
}
