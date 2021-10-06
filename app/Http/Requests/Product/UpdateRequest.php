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
            'name'=>'string|required|unique:products,name,'.$this->route('product')->id.'|max:255|alpha',

            'sell_price'=>'numeric|required|between:1,99999999',
            'category_id'=>'integer|required|exists:App\Category,id',
            'provider_id'=>'integer|required|exists:App\Provider,id',
            'picture'=> 'mimes:jpeg,bmp,png,jpg|nullable'
        ];
    }
    public function messages()
    {
        return[
            'name.string'=>'Solo se permiten caracteres.',
            'name.required'=>'El campo es requerido.',
            'name.unique'=>'El producto ya esta registrado.',
            'name.max'=>'Solo se permite 255 caracteres.',
            'name.alpha'=>'Solo se permiten letras.',



            'sell_price.numeric'=>'Solo se permiten valores numericos.',
            'sell_price.required'=>'El campo es requerido.',
            'sell_price.between'=>'Solo se permiten 9 caracteres.',

            'picture.mimes'=>'El formato debe ser jpg , jpeg, png o bmp.',

            'category_id.integer'=>'El valor tiene que ser entero.',
            'category_id.required'=>'El campo es requerido.',
            'category_id.exists'=>'La categoria no existe.',

            'provider_id.integer'=>'El valor tiene que ser entero.',
            'provider_id.required'=>'El campo es requerido.',
            'provider_id.exists'=>'El proveedor no existe.',
        ];
    }
}
