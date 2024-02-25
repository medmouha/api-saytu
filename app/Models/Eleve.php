<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenom',
        'nom',
        'adresse',
        'dateNaissance',
        'lieuNaissance',
        'classe_id'
    ];

    // public function classes()
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }
}