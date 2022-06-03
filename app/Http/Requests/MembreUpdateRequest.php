<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembreUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => ['required', 'string'],
            'prenom' => ['required', 'string'],
            'cni' => ['string', 'unique:membres,cni'],
            'matricule' => ['string', 'unique:membres,matricule'],
            'lieu_naissance' => ['string'],
            'date_naissance' => ['required', 'date'],
            'telephone' => ['string'],
            'email' => ['email'],
            'sexe' => ['string'],
            'situation_matrimoniale' => ['string'],
            'structure_id' => ['string'],
        ];
    }
}
