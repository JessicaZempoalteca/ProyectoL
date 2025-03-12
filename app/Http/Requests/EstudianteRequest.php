<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteRequest extends FormRequest
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
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'edad' => 'required|integer|min:15|max:99',
            'email' => 'required|email',
            'telefono' => 'required|string|max:10',
            'grupo_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es un campo obligatorio.',
            'apellidos.required' => 'Los apellidos son un campo obligatorio.',
            'edad.required' => 'La edad es un campo obligatorio.',
            'email.required' => 'El email es un campo obligatorio.',
            'telefono.required' => 'El teléfono es un campo obligatorio.',
            'grupo_id.required' => 'Debe elegir un grupo.',
        ];

    }
}
