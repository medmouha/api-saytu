<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Eleve;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    try {
        $validatedData = $request->validate([
            'eleve_id' => 'required',
            'matiere_id' => 'required',
            'note' => 'required',
        ]);
        $eleveId = $validatedData['eleve_id'];

        $eleve = Eleve::find($eleveId);

        if (!$eleve) {
            return response()->json([
                'success' => false,
                'message' => 'L\'élève spécifié n\'existe pas.',
            ]);
        }
        $matiereId = $validatedData['matiere_id'];
        $note = Evaluation::create([
            'eleve_id' => $eleveId,
            'matiere_id' => $matiereId, // Utilisation de $matiereId récupéré
            'note' => $validatedData['note'],
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Note ajoutée avec succès.',
            'note' => $note,
        ]);

    } catch (\Throwable $th) {
        return response()->json([
            'success' => false,
            'message' => 'Une erreur est survenue lors de l\'ajout de la note.',
            'error' => $th->getMessage(),
        ]);
    }


    }

    /**
     * Display the specified resource.
     */
    
     
     public function show(Evaluation $evaluation)
     {
         try {
             // Charger les relations eleve et matiere pour l'évaluation spécifiée
             $evaluation->load('eleve', 'matiere');
     
             // Retourner les détails de l'évaluation avec les détails de l'élève et de la matière
             return response()->json([
                 'status_code' => 200,
                 'status_message' => 'L\'évaluation a été bien trouvée',
                 'evaluation' => $evaluation,
             ]);
         } catch (\Throwable $th) {
             return response()->json([
                 'status_code' => 500,
                 'status_message' => 'Une erreur est survenue lors de la récupération de l\'évaluation.',
                 'error' => $th->getMessage(),
             ], 500);
         }
     }
     


     public function getAllEvaluations()
{
    try {
        // Récupérer toutes les évaluations
        $evaluations = Evaluation::all();

        // Charger les relations eleve et matiere pour chaque évaluation
        $evaluations->load('eleve', 'matiere');

        // Retourner les détails de toutes les évaluations
        return response()->json([
            'success' => true,
            'evaluations' => $evaluations,
        ]);

    } catch (\Throwable $th) {
        return response()->json([
            'success' => false,
            'message' => 'Une erreur est survenue lors de la récupération des évaluations.',
            'error' => $th->getMessage(),
        ], 500);
    }}
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }
}
