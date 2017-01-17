<?php

namespace Cinema\Http\Requests;

use Cinema\Http\Requests\Request;

class UserCreateRequest extends Request
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
        | request, en este caso para crear usuario.
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
        | Ponemos los campos que queremos validar, en este caso se les agregará 
        | el atributo required
        */
        return [
            "name" => "required",
            /*
            | Es importante hacer esta validación ya que en la base de datos 
            | no pueden existir dos registros con el mismo email, para eso se 
            | usa "|unique:users" que hace referencia a que este campo debe 
            | ser "unico" en la tabla "users"
            */
            "email" => "required|unique:users", 
            "password" => "required",
        ];
    }
}
