<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];
    public function clientLoc(){
        return $this->belongsTo(Client::class,"id_client","id");
    }
    public function voiture(){
        return $this->belongsTo(Voiture::class,"id_voiture","id");
    }
}
