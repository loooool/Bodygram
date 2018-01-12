<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ReceptionRegisterMember extends Request
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
            //
            'name' => 'required',
            'sex' => 'required',
            'category_id' => 'required',
            'birth_date' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'code' => 'required',
        ];
    }
}
