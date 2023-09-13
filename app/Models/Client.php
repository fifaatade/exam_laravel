<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //use HasFactory;
    protected $table='client';
    protected $fillable=[
        'nom',
        'prenom',
        'tel',
        'adresse',
        'photo',
        'cni',
        'email',
        'id_user',
    ];
    public function user(){
        return $this->belongsTo(User::class,"id_user","id");
    }
    public function location(){
        return $this->hasMany(Location::class,"id_client","id");
    }
}
