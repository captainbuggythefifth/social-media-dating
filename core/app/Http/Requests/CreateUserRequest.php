<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUserRequest extends Request
{
    /**
     * Determine if the users is authorized to make this request.
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
            'user_name'         => 'required|unique:users,user_name',
            'email_address'     => 'required|unique:users,email_address',
            'password'          => 'required',
            'first_name'        => 'required',
            'last_name'         => 'required',
            'birth_date'        => 'required',
            'gender'            => 'required',
            'country'           => 'required'
        ];
    }
}