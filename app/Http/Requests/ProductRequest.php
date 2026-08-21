<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // Dictatorship 3: Defining return types (bool)
    public function authorize(): bool
    {
        // Set to true so anyone can create a product for now
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    // Dictatorship 2: Validations must be in the Request, not the Controller.
    // Dictatorship 3: Defining return types (array)
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            // Project Requirement: Price must be strictly greater than zero (gt:0)
            'price' => 'required|numeric|gt:0',
        ];
    }
}
