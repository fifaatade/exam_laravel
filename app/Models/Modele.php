<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    //use HasFactory;
    protected $table='modele';
    protected $fillable=[
        'modele_name',
        'annee',
        'id_marque',
    ];
    public function marque(){
        return $this->belongsTo(Marque::class,"id_marque","id");
    }
    public function voitureMod(){
        return $this->hasMany(Voiture::class,"modele_id","id");
    }
}
