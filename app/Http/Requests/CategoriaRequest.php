<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cod_categoria' => 'required|unique:categorias,cod_categoria|min:1|max:255',
            'nombre' => 'required|min:1|max:100|string',
            'descripcion' => 'required|min:1',
        ];
    }

    public function messages()
    {
        return [
            'cod_categoria.required' => 'El campo de código de categoría es obligatorio.',
            'cod_categoria.unique' => 'El código de categoría ya existe. Debe ser único.',
            'cod_categoria.min' => 'El código de categoría debe tener al menos :min caracteres.',
            'cod_categoria.max' => 'El código de categoría no puede tener más de :max caracteres.',
            'nombre.required' => 'El campo de nombre es obligatorio.',
            'nombre.min' => 'El nombre debe tener al menos :min caracteres.',
            'nombre.max' => 'El nombre no puede tener más de :max caracteres.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'descripcion.required' => 'El campo de descripción es obligatorio.',
            'descripcion.min' => 'La descripción debe tener al menos :min caracteres.',
        ];
    }
}
