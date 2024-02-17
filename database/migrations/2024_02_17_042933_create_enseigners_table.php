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
        Schema::create('enseigners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('professeur_id')->references('id')->on('professeurs')->onDelete('cascade');
            $table->foreignId('matiere_id')->references('id')->on('matieres')->onDelete('cascade');
            $table->foreignId('classe_id')->references('id')->on('classes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enseigners');
    }
};