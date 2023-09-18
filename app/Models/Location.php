<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Voiture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    //use HasFactory;
    protected $table='location';
    protected $fillable=[
        'id_client',
        'date_sortie_voiture',
        'date_prevue_retour',
        'date_retour_effectif',
        'id_voiture',
        'id_modele',
        'id_marque',
        'status'
    ];
    public function client(){
        return $this->belongsTo(Client::class,"id_client","id");
    }
    public function voiture(){
        return $this->belongsTo(Voiture::class,"id_voiture","id");
    }
    public function modele(){
        return $this->belongsTo(Modele::class,"id_modele","id");
    }
    public function marque(){
        return $this->belongsTo(Marque::class,"id_marque","id");
    }
}
