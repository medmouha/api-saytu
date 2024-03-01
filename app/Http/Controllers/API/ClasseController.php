<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    

    public function index()
    {
        $classes = Classe::all();
        return response()->json(['classes' => $classes], 200);
    }

    // Créer une nouvelle classe
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string'
        ]);

        $classe = Classe::create($request->all());
        return response()->json(['classe' => $classe], 201);
    }

    // Afficher les détails d'une classe spécifique
    public function show($id)
    {
        $classe = Classe::findOrFail($id);
        if (!$classe) {
            return response()->json(['message' => 'Classe not found'], 404);
        }
        return response()->json(['classe' => $classe], 200);
    }

    // Mettre à jour les détails d'une classe
    public function update(Request $request, $id)
    {
        $classe = Classe::findOrFail($id);
        if (!$classe) {
            return response()->json(['message' => 'Classe not found'], 404);
        }

        $request->validate([
            'libelle' => 'required|string'
        ]);

        $classe->update($request->all());
        return response()->json(['message' => 'Classe updated successfully'], 200);
    }

    // Supprimer une classe
    public function destroy($id)
    {
        $classe = Classe::findOrFail($id);
        if (!$classe) {
            return response()->json(['message' => 'Classe not found'], 404);
        }

        $classe->delete();
        return response()->json(['message' => 'Classe deleted successfully'], 200);
    }
}
