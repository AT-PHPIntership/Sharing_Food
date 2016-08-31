<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserEditRequest extends Request
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
            'username'   => 'required|regex:/^[A-Za-z \t]*\p{L}+/i|max:50|min:3',
            'email'      => 'required|email|min:10|max:100',
            'fullname'   => 'required|regex:/^[A-Za-z \t]*\p{L}+/i|max:100|min:3',
            'address'    => 'required|regex:/^[.,\-\/A-Za-z0-9 \t]*\p{L}+/i|max: 100|min:6',
            'birthday'   => 'required|date|max:10',
            'phone'      => 'required|regex:/^[0-9]*$/i|max: 14|min:10',
            'information'=> 'required|regex:/^[A-Za-z0-9 \t]*\p{L}+/i|max:1000',
            'role'       => 'required',
            'image'     => 'mimes:jpeg,jpg,png|max:100',
        ];
    }
}
