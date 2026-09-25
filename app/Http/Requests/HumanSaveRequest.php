<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HumanSaveRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'aura' => [
                'required',
                'integer',
                'min:0',
            ],
            'hierarchy' => [
                'required',
                'string',
                'max:20',
                'in:común,moderado,legendario',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser un texto.',
            'name.max' => 'El nombre no puede superar los 255 caracteres.',
            'aura.required' => 'La cantidad de aura es obligatoria.',
            'aura.integer' => 'La cantidad de aura debe ser un número entero.',
            'aura.min' => 'La cantidad de aura no puede ser negativa.',
            'hierarchy.required' => 'La jerarquía es obligatoria.',
            'hierarchy.string' => 'La jerarquía debe ser un texto.',
            'hierarchy.max' => 'La jerarquía no puede superar los 20 caracteres.',
            'hierarchy.in' => 'La jerarquía seleccionada no es válida.',
        ];
    }
}
