<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationFormRequest extends FormRequest
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
            'name'=>'required|min:5|max:30',
            'time'=>'required|min:1|max:3',
            //'price'=>'required|min:1|max:3',
            'price'=>'required|numeric|between:1,99',
            'kcal'=>'required|min:1|max:3',
            'description'=>'required|min:10|max:5000',
            'image'=>'mimes:jpg,png',
        ];
    }
    public function messages(){
        return [
            'name.required'=>'El nombre es obligatorio',
            'name.min'=>'Debe tener al menos 5 caracteres',
            'name.max'=>'Debe tener como máximo 30 caracteres',
            'time.required'=>'El campo de tiempo es obligatorio',
            'time.min'=>'El campo tiempo debe tener al menos 1 dígito',
            'time.max'=>'El campo tiempo debe tener como máximo 3 dígitos',
            'price.required'=>'El campo precio es obligatorio',
            //'price.min'=>'El campo precio debe tener al menos 1 dígito',
            //'price.max'=>'El campo precio debe tener como máximo 3 dígitos',
            'price.between'=>'El campo precio debe estar entre 1 y 99',
            'kcal.required'=>'El campo de calorias es obligatorio',
            'kcal.min'=>'El campo calorías debe tener al menos 1 dígito',
            'kcal.max'=>'El campo calorías debe tener como máximo 3 dígitos',
            'description.required'=>'El campo descripción es obligatorio',
            'description.min'=>'El campo descripción no puede tener menos de 10 caracteres',
            'description.max'=>'El campo descripción no puede tener más de 5000 caracteres',
            'image.mimes'=>'Solo puedes subir archivos jpg y png',
        ];
    }
}
