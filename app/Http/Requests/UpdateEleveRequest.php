<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateEleveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'adresse' => 'required',
            'dateNaissance' => 'required|date',
            'lieuNaissance' => 'required|string|max:255',
            'classe_id' => 'required'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'=> false,
            'error'=> true,
            'message'=>"erreur de validation",
            'errorsList'=> $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'prenom.required' => "Le prenom est obligatoire",
            'prenom.string' => "prenom invalide",
            'nom.required' => "Le nom est obligatoire",
            'nom.string' => "nom invalide",
            'adresse.required' => "L'adresse est obligatoire",
            'dateNaissance.required' => "La date de naissance est obligatoire",
            'dateNaissance.date' => "format de date invalide",
            'lieuNaissance.required' => "Le lieu de naissance est obligatoire",
            'lieuNaissance.string' => "lieu de naissance invalide",
            'classe_id' => "La classe est obligatoire"
        ];
    }
}
