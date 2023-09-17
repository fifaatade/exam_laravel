<?php

namespace App\Models;

use App\Models\Marque;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    //use HasFactory;
    protected $table='categorie';
    protected $fillable=[
        'name',
    ];
    public function marque(){
        return $this->hasMany(Marque::class,"id_categorie","id");
    }
}
