<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationFormComentario extends FormRequest
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
            'comentario'=>'required|min:10|max:500',
        ];
    }

    public function messages(){
        return [
            'comentario.required'=>'Este campo es obligatorio',
            'comentario.min'=>'Debe tener al menos 10 caracteres',
            'comentario.max'=>'No puede tener más de 500 caracteres',
        ];
    }
}
