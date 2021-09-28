<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'=>'string|required|unique:products,name,'.$this->route('product')->id.'|max:255',

            'sell_price'=>'required|',
            'category_id'=>'integer|required|exists:App\Category,id',
            'provider_id'=>'integer|required|exists:App\Provider,id',
        ];
    }
    public function messages()
    {
        return[
            'name.string'=>'El nombre es requerido.',
            'name.required'=>'El campo es requerido.',
            'name.unique'=>'El producto ya esta registrado.',
            'name.max'=>'Solo se permite 255 caracteres.',



            'sell_price.required'=>'El campo es requerido.',

            'category_id.integer'=>'El valor tiene que ser entero.',
            'category_id.required'=>'El campo es requerido.',
            'category_id.exists'=>'La categoria no existe.',

            'provider_id.integer'=>'El valor tiene que ser entero.',
            'provider_id.required'=>'El campo es requerido.',
            'provider_id.exists'=>'El proveedor no existe.',
        ];
    }
}
