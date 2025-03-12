<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupoRequest extends FormRequest
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
            'semestre' => 'required|string|max:255',
            'grupo' => 'required|string|max:255',
            'turno' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'semestre.required' => 'El semestre es un campo obligatorio.',
            'grupo.required' => 'El grupo es un campo obligatorio.',
            'turno.required' => 'Debe elegir entre las opciones.',
        ];

    }
}