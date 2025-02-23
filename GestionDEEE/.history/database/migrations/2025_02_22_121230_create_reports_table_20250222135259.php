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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('quantité');
            $table->enum('quantité',['fonctionnel','hors_services']);
            $table->string('adresse');
            $table->string('coordonnéesGPS');
            $table->date('dateSignalement');
            $table->enum('statut',['en attente','traité']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
