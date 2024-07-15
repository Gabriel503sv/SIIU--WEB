<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            //
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user, // Valida la unicidad del email, ignorando el email actual
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'required|same:password',
            'informacion_personal.apellidos' => 'required|string|max:255',
            'informacion_personal.nombres' => 'required|string|max:255',
            'informacion_personal.fecha_nacimiento' => 'required|date',
            'informacion_personal.genero' => 'required|string|max:255',
            'informacion_personal.dui' => 'nullable|string|max:255',
            'informacion_personal.nacionalidad' => 'required|string|max:255',
        ];
    }
}
