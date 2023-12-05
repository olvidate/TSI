<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TallasRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|min:1|max:100|string',
        ];
    }

    public function messages()
    {
        return [
            'nombre.min' => 'El nombre debe tener al menos :min caracteres.',
            'nombre.max' => 'El nombre no puede tener más de :max caracteres.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
        ];
    }
}
