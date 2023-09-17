<?php

use App\Models\Voiture;
    
    if(!function_exists('idsDB')){
        function idsDB(){
            $id=Voiture::pluck('id')->toArray();
            return $id;
        }
    }
    
?>