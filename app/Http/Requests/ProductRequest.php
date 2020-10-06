<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|min:3',
            'description'   => 'required|min:10',
            'body'          => 'required|min:30',
            'price'         => 'required|numeric',
            'slug'          => 'required' 
        ];
    }

    public function messages(){
        return [
            'required'  => 'este campo é obrigatório',
            'numeric'   => 'Esse campo deve ser do tipo numerico',
            'min'       => 'Esse campo deve ter no minimo :min caracteres'
        ];
    }

}
