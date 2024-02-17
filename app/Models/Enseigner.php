<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseigner extends Model
{
    use HasFactory;

    protected $fillable = [
        'professeur_id',
        'matiere_id',
        'classe_id'
    ];

    public function professeurs()
    {
        return $this->belongsTo(Professeur::class, 'professeur_id');
    }

    public function matieres()
    {
        return $this->belongsTo(Matiere::class, 'matiere_id');
    }

    public function classes()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }
}
