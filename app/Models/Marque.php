<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Marque extends Model
{
    //use HasFactory;
    protected $table='marque';
    protected $fillable=[
        'name',
        'id_categorie',
    ];
    public function categorie(){
        return $this->belongsTo(Categorie::class,"id_categorie","id");
    }
    public function location(){
        return $this->hasMany(Location::class,"id_marque","id");
    }
}
