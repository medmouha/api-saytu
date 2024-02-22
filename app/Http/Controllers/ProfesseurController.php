<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professeur;

class ProfesseurController extends Controller
{
    public function index()
    {
        return Professeur::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required'
        ]);

        return Professeur::create($validatedData);
    }

    public function show($id)
    {
        return Professeur::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required'
        ]);

        $professeur = Professeur::findOrFail($id);
        $professeur->update($validatedData);

        return $professeur;
    }

    public function destroy($id)
    {
        $professeur = Professeur::findOrFail($id);
        $professeur->delete();

        return response()->json(['message' => 'Professeur supprimé avec succès']);
    }
}
