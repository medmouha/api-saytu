<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'eleve_id',
        'matiere_id',
        'note'
    ];

    public function eleve()
    {
        return $this->belongsTo(Eleve::class, 'eleve_id');
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'matiere_id');
    }
}



    

//     public function eleves()
//     {
//         return $this->belongsTo(Eleve::class, 'eleve_id');
//     }

//     public function matiere()
//     {
//         return $this->belongsTo(Matiere::class, 'matiere_id');
//     }
// }
