<?php

namespace Cinema\Http\Requests;

use Cinema\Http\Requests\Request;

class ProfCreateRequest extends Request
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
          'name' => 'required|alpha|max:50',
          'surname' => 'required|alpha|max:50',
          'email' => 'required|email|unique:profesionals',
          'phone' => 'required|numeric',
          'password' => 'required|max:50',
          'confirmar_contrasena' => 'required|same:password',
          
        ];
    }
}
