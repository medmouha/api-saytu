<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEleveRequest;
use App\Http\Requests\UpdateEleveRequest;
use App\Models\Classe;
use App\Models\Eleve;
use Carbon\Carbon;
use Exception;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $eleves = Eleve::all();

            return response()->json([
                'status_code' => 200,
                'status_message' => "La liste des eleves",
                'eleve' => $eleves
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEleveRequest $request)
    {
        try {
            $classe = Classe::where('id', $request->classe_id)->firstOrFail();
            $eleve = new Eleve();

            $eleve->prenom = ucwords($request->prenom);
            $eleve->nom = strtoupper($request->nom);
            $eleve->adresse = $request->adresse;
            $eleve->dateNaissance = Carbon::parse($request->dateNaissance)->format('Y-m-d');
            $eleve->lieuNaissance = $request->lieuNaissance;
            $eleve->classe_id = $request->classe_id;
            $eleve->save();

            $eleve->matricule = mb_substr($eleve->prenom, 0, 1) . mb_substr($eleve->nom, 0, 1) . date("Y") . 0 . $eleve->id;
            $eleve->save();

            $classe->effectif += 1;
            $classe->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => "L'eleve a ete bien ajoute",
                'eleve' => $eleve
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Eleve $eleve)
    {
        try {
            $classe = Classe::where('id', $eleve->classe_id)->pluck('libelle')->firstOrFail();

            return response()->json([
                'status_code' => 200,
                'status_message' => "L'eleve a ete bien trouve",
                'eleve' => $eleve,
                'classe' => $classe
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEleveRequest $request, Eleve $eleve)
    {
        try {
            $classe = Classe::where('id', $request->classe_id)->firstOrFail();
            $cla = Classe::where('id', $eleve->classe_id)->firstOrFail();
            $eleve->update($request->validated());
            if ($classe->id != $cla->id) {
                $classe->effectif += 1;
                $classe->save();
                $cla->effectif -= 1;
                $cla->save();
            }
            
            return response()->json([
                'status_code' => 200,
                'status_message' => "L'eleve a ete bien modifie",
                'eleve' => $eleve
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eleve $eleve)
    {
        try {
            $classe = Classe::where('id', $eleve->classe_id)->firstOrFail();

            $eleve->delete();
            $classe->effectif -= 1;
            $classe->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => "L'eleve a ete bien supprime"
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }
}
