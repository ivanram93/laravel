<?php

namespace Cinema\Http\Requests;

use Cinema\Http\Requests\Request;

class UserUpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /*
        | Para que pueda funcionar la validación, debemos autorizar dicho 
        | request, en este caso para crear usuario
        */
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        /*
        | Ponemos los campos que queremos validar, en este caso se les 
        | agregará el atributo required
        */
        return [
            "name" => "required",
            "email" => "required",
        ];
    }
}
