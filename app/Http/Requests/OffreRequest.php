<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OffreRequest extends FormRequest
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
            'libelle'=> "required",
            'description'=> "required",
            'date_limite'=> "required|date",
            'localisation'=> "required|string",
            'statut_offre_id'=> "required|exists:statut_offres,id",
            'type_contrat_id'=> "required|exists:type_contrats,id",
        ];
    }
}
