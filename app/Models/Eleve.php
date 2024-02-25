<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;

    public function getRows()
    {
        //API
        // $eleves = Http::timeout(3600)->get('http://127.0.0.1:8000/eleves')->json();
        // $eleves = Http::get('http://127.0.0.1:8000/eleves')->json();

        // return $eleves;
    }    

    protected $fillable = [
        'prenom',
        'nom',
        'adresse',
        'dateNaissance',
        'lieuNaissance',
        'classe_id'
    ];

    public function classes()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }
}
