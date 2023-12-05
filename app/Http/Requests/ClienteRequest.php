<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'email' => 'required|email:rfc|min:10|max:50|unique:clientes',
            'password' => 'bail|required|min:6|max:20',
            'rut' => 'required',
        ];
    }

    public function messages():array
    {
        //'campo.regla'=>'mensaje'
        return [
            'email.required'=>'Necesitas un email',
            'email.unique'=>'Este email está en uso',
            'email.min'=>'Mínimo 10 caractéres para el email',
            'email.max'=>'Máximo 50 caractéres para el email',
            'password.requrired'=>'Necesitas una contraseña para registrarte',
            'password.min'=>'Mínimo 6 caractéres para la contraseña',
            'password.max'=>'Máximo 20 caractéres para la contraseña',
            'rut.required'=>'Debes indicar tu RUT',
        ];
    }
}
