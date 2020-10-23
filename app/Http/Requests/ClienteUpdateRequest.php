<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteUpdateRequest extends FormRequest
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
            'nombre'=>['required','max:30'],
            'apellidoPaterno'=>['required','max:30'],
            'apellidoMaterno'=>['required','max:30'],
            'email'=>['required'],
            'celular'=>['required','min:10','max:14'],
            'curp'=>['required','min:18','max:18'],
            'codigo'=>[''],
            'tipoCliente'=>['required'],
            'idIdentificacion'=>['required']
        ];
    }
}
