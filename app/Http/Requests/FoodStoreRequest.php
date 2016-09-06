<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FoodStoreRequest extends Request
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
            'name' => 'required|regex:'.config('define.regex_username').'|max:50|min:3',
            'information' => 'required|max:5000',
        ];
    }
}
