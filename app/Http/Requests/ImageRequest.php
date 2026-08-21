<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    // Dictadura 3: Tipado estricto
    public function authorize(): bool
    {
        return true;
    }

    // Dictadura 2 y 3: Validaciones fuera del controlador
    public function rules(): array
    {
        return [
            'profile_image' => 'required|image',
        ];
    }
}
