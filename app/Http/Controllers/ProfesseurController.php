<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professeur;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class ProfesseurController extends Controller
{
    /**
     * Affiche une liste des ressources.
     */
    public function index()
    {
        try {
            return Professeur::all();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Une erreur est survenue lors de la récupération des données.'], 500);
        }
    }

    /**
     * Stocke une nouvelle ressource.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'prenom' => 'required|string',
                'nom' => 'required|string',
                'email' => 'required|email|unique:professeurs,email',
                'telephone' => 'required|numeric|unique:professeurs,telephone'
            ]);

            return Professeur::create($validatedData);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Une erreur est survenue lors de la création du professeur.'], 500);
        }
    }

    /**
     * Affiche la ressource spécifiée.
     */
    public function show(Professeur $professeur)
    {
        try {
            return $professeur;
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Professeur non trouvé.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Une erreur est survenue lors de la récupération du professeur.'], 500);
        }
    }

    /**
     * Met à jour la ressource spécifiée.
     */
    public function update(Request $request, Professeur $professeur)
    {
        try {
            $validatedData = $request->validate([
                'prenom' => 'required|string',
                'nom' => 'required|string',
                'email' => 'required|email',
                'telephone' => 'required|numeric|unique:professeurs,telephone'
            ]);

            $professeur->update($validatedData);

            return $professeur;
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Une erreur est survenue lors de la mise à jour du professeur.'], 500);
        }
    }

    /**
     * Supprime la ressource spécifiée.
     */
    public function destroy(Professeur $professeur)
    {
        try {
            $professeur->delete();
            return response()->json(['message' => 'Professeur supprimé avec succès']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Une erreur est survenue lors de la suppression du professeur.'], 500);
        }
    }
}
