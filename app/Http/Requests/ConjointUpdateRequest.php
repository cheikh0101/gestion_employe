<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConjointUpdateRequest extends FormRequest
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
            'lieu_naissance' => ['string'],
            'date_naissance' => ['required', 'date'],
            'date_mariage' => ['required', 'date'],
            'telephone' => ['string'],
            'membre_id' => ['required', 'integer', 'exists:membres,id'],
        ];
    }
}
