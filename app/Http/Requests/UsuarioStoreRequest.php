<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioStoreRequest extends FormRequest
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
            'nombre'=>['required'],
            'apellido'=>['required'],
            'celular'=>['required','min:10','max:14'],
            'email'=>['required','unique:tbl_usuarios,email'],
            'password'=>['required','min:8','confirmed'],
            'idRol'=>['required']
        ];
    }
}
