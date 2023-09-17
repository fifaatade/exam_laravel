<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
