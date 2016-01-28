<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCharacterRequest extends Request
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
            'families_id'                   => 'required',
            'character_name'                => 'required',
            'character_age'                 => 'required',
            'character_avatar'              => 'required',
            'character_description'         => 'required'
        ];
    }
}