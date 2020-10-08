<?php

namespace App\Http\Requests;

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
            'name'          => 'required|min:3',
            'description'   => 'required|min:10',
            'phone'         => 'required|min:10|integer',
            'mobile_phone'  => 'required|min:10|integer',
            'logo'        => 'image'
        ]; 
    }

    public function messages(){
        return [
            'required'  => 'Este campo é obrigatório',
            'min'       => 'Esse campo deve ter no minimo :min caracteres',
            'integer'   => 'O campo precisa ser do tipo inteiro',
            'image'     => 'O arquivo não é uma imagem valida'
        ];
    }

}
