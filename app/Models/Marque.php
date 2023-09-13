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
        'categorie_id',
    ];
    public function categorie(){
        return $this->belongsTo(Categorie::class,"categorie_id","id");
    }
}
