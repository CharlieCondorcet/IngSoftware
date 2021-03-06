<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveBitacoraRequest extends FormRequest
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
            'titulo'=>'required|min:3',
            'estado'=>'',
            'causa_renuncia'=>''
        ];
    }

    public function messages()
    {
        return [
            'titulo.required'=>'Debe ingresar un titulo para la Bitacora',
            'titulo.min'=>'Debe ingresar un titulo de almenos 3 caracteres para la Bitacora'
        ];
    }
}
