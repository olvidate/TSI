<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductosRequest extends FormRequest
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
            'cod_producto' => 'required|unique:productos,cod_producto|min:1|max:7',
            'cod_categoria' => 'bail|required|exists:categorias,cod_categoria',
            'nombre' => 'bail|required|min:1|max:100|string',
            'descripcion' => 'bail|required|min:1',
            'marca' => 'bail|required|string|min:1|max:50',
            'id_talla' => 'bail|required|exists:tallas,id',
            'id_color' => 'bail|required|exists:colores,id',
            'foto' => 'bail|mimes:jpeg,png,jpg,gif|nullable',
        ];
    }

    public function messages()
    {
        return [
            'cod_producto.required' => 'El campo de código de producto es obligatorio.',
            'cod_producto.unique' => 'El código de producto ya existe. Debe ser único.',
            'cod_producto.min' => 'El código de producto debe tener al menos :min caracteres.',
            'cod_producto.max' => 'El código de producto no puede tener más de :max caracteres.',
            'cod_categoria.required' => 'El campo de categoría es obligatorio.',
            'cod_categoria.exists' => 'La categoría seleccionada no es válida.',
            'nombre.required' => 'El campo de nombre es obligatorio.',
            'nombre.min' => 'El nombre debe tener al menos :min caracteres.',
            'nombre.max' => 'El nombre no puede tener más de :max caracteres.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'descripcion.required' => 'El campo de descripción es obligatorio.',
            'descripcion.min' => 'La descripción debe tener al menos :min caracteres.',
            'marca.required' => 'El campo de marca es obligatorio.',
            'marca.string' => 'La marca debe ser una cadena de texto.',
            'marca.min' => 'La marca debe tener al menos :min caracteres.',
            'marca.max' => 'La marca no puede tener más de :max caracteres.',
            'id_talla.required' => 'El campo de talla es obligatorio.',
            'id_talla.exists' => 'La talla seleccionada no es válida.',
            'id_color.required' => 'El campo de color es obligatorio.',
            'id_color.exists' => 'El color seleccionado no es válido.',
            'foto.mimes' => 'El formato de la foto no es válido. Se admiten archivos de tipo: :values.',
        ];
    }
}
