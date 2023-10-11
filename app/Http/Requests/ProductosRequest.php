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
}
