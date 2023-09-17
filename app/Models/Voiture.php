<?php

namespace App\Models;

use App\Models\Marque;
use App\Models\Modele;
use App\Models\Location;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'modele_id',
        'id_marque',
        'id_categorie'
    ];
    public function locationVoi(){
        return $this->hasMany(Location::class,"id_voiture","id");
    }
    public function modele(){
        return $this->belongsTo(Modele::class,"modele_id","id");
    }
    public function categorie(){
        return $this->belongsTo(Categorie::class,"id_categorie","id");
    }
    public function marque(){
        return $this->belongsTo(Marque::class,"id_marque","id");
    }
}
