<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Professeur extends Model
{
    use HasFactory;

    public function matieres(): BelongsTo
    {
        return $this->BelongsTo(Matiere::class);
    }

    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'password',
        'telephone',
        'matieres_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];


}
