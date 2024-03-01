<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Matiere extends Model
{
    use HasFactory;

    public function proffesseurs(): HasMany
    {
        return $this->HasMany(Professeur::class);
    }

    protected $fillable = [
        'libelle',
        'coefficent',
    ];

}
