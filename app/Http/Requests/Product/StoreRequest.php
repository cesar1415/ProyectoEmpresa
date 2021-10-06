<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\JsonResponse;
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

            'name'=>'string|required|unique:products|max:255|alpha',
            'sell_price'=>'numeric|required|between:1,99999999',
            'picture'=> 'mimes:jpeg,bmp,png,jpg|nullable'

        ];
    }
    public function messages()
    {
        return[
            // 'name.string'=>'Solo se permiten letras.',
            'name.required'=>'El campo es requerido.',
            'name.unique'=>'El producto ya esta registrado.',
            'name.max'=>'Solo se permite 255 caracteres.',
            'name.alpha'=>'No se permiten valores numericos.',

            'sell_price.numeric'=>'Solo se permiten valores numericos.',
            'sell_price.required'=>'El campo es requerido.',
            'sell_price.between'=>'Solo se permiten 9 caracteres.',

            'picture.mimes'=>'El formato debe ser jpg , jpeg, png o bmp.'


        ];
    }
    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 422);
        }

        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }
}
