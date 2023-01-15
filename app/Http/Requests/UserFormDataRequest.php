<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserFormDataRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'category_id'         => 'required',
            'identification_card' => 'required|unique:users,identification_card,'.$this->get('id'),
            'first_name'          => 'required|alpha_spaces|min:5|max:100',
            'last_name'           => 'required|alpha_spaces|max:100',
            'email' =>              'required|unique:users,email,'. $this->get('id'),
            'country'             => 'required',
            'address'             => 'required|max:180',
            'cellphone'           => 'alpha_num|digits:10',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required'         => 'La categoría es obligatoria',

            'identification_card.required' => 'La cédula es obligatoria',
            'identification_card.unique'   => 'La cédula ya se encuentra registrada',

            'first_name.required' => 'El nombre es obligatorio',
            'first_name.alpha_spaces'  => 'El nombre sólo admite caracteres',
            'first_name.min'      => 'El nombre requiere mínimo de 5 caracteres',
            'first_name.max'      => 'El nombre admite un máximo de 100 caracteres',

            'last_name.required'  => 'El apellido es obligatorio',
            'last_name.alpha_spaces' => 'El apellido sólo admite caracteres',
            'last_name.max'       => 'El apellido admite un máximo de 100 caracteres',

            'email.required'      => 'El email es obligatorio',
            'email.unique'        => 'El email ya se encuentra registrado',
            'email.max'           => 'El email admite un máximo de 150 caracteres',

            'country.required'    => 'El país es obligatorio',

            'address.required'    => 'La dirección es obligatoria',
            'address.max'         => 'La dirección admite un máximo de 180 caracteres',

            'cellphone.alpha_num' => 'El celular sólo admite números',
            'cellphone.digits'    => 'El celular debe ser de 10 dígitos',

        ];
    }
}
