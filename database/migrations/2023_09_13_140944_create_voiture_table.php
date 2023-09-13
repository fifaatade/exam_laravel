<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('voiture', function (Blueprint $table) {
            $table->id();
            $table->string('nom_voiture');
            $table->string('boite_vitesse');
            $table->integer('puissance');
            $table->integer('nbre_porte');
            $table->string('carburant');
            $table->integer('nbre_cylindre');
            $table->integer('soupape');
            $table->integer('vitesse_max');
            $table->string('frein');
            $table->integer('acceleration');
            $table->string('couleur');
            $table->string('image_principale');
            $table->string('image_2');
            $table->string('image_3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voiture');
    }
};
