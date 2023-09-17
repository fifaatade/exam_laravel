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
        Schema::table('voiture', function (Blueprint $table) {
            $table->foreignId('id_categorie')
            ->nullable()
            ->constrained('categorie')
            ->onUpdate("cascade")
            ->onDelete("cascade");
            $table->foreignId('id_marque')
            ->nullable()
            ->constrained('marque')
            ->onUpdate("cascade")
            ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
