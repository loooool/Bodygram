<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminRegisterUserRequest extends Request
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
            'birth_date' => 'required|date_format:m/d/Y',
            'role' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ];
    }
}
