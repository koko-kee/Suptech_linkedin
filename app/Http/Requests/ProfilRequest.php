<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilRequest extends FormRequest
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
        //Tester si notre route nous permet de faire des modifications
        if (request()->routeIs('entreprise.profil.update')) {
            $logo = 'logo|sometimes';
        }
        
        // Validations
        return ([
            'logo' => $logo,
            'nom' => 'required',
        ]);
    }
    // Tester si dans notre requette nous avons le logo
    public function prepareForValidation()
    {
        if ($this->logo == null) {
            $this->request->remove('logo');
        }
    }
}
