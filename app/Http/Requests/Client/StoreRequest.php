<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|max:255',
            'dni' => 'required|unique:clients',
            'ruc' => 'nullable|string|unique:clients',
            'address' => 'nullable|string|max:255',
            'phone' => 'string|nullable|unique:clients',
            'email' => 'string|nullable|unique:clients|max:255|email:rfc,dns',
        ];
    }
    public function messages()
    {
        return [

            // 'name.string'=>'Solo se permiten caracteres y no numeros.',
            'name.required' => 'El nombre es requerido.',
            'name.max' => 'Solo se permiten 255 caracteres.',

            // 'dni.string'=>'El valor no es correcto.',
            'dni.required' => 'El DNI es requerido.',
            'dni.unique' => 'Este DNI ya se encuentra registrado.',
            // 'dni.min'=>'Se requiere de 8 caracteres.',
            // 'dni.max'=>'Solo se permite 8 caracteres.',

            'ruc.string' => 'El valor no es correcto.',
            'ruc.unique' => 'El numero de RUC ya se encuentra registrado.',
            // 'ruc.min'=>'Se requiere de 11 caracteres.',
            // 'ruc.max'=>'Solo se permite 11 caracteres.',

            'address.string' => 'El valor no es correcto.',
            'address.max' => 'Solo se permite 255 caracteres.',

            'phone.string' => 'El valor no es correcto.',
            'phone.unique' => 'El numero de celular ya se encuentra registrado.',
            // 'phone.min'=>'Se requiere de 9 caracteres.',
            // 'phone.max'=>'Solo se permite 9 caracteres.',

            'email.string' => 'El valor no es correcto.',
            'email.unique' => 'La direccion de correo electrónico ya se encuentra registrado.',
            'email.max' => 'Solo se permite 255 caracteres.',
            'email.email' => 'No es una direccion de correo electrónico.',
        ];
    }
}
