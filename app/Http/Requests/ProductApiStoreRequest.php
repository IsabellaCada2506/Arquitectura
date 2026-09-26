<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductApiStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:1'],
        ];
    }
}
