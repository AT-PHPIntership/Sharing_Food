<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FoodCreateRequest extends Request
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
            'name_food' => 'required|regex:'.config('define.regex_username').'|max:50|min:3',
            'introduce' => 'required|regex:/[A-Za-z0-9]*$/i|max: 1000|min:10',
            'place' => 'required',
            'type' => 'required',
            'food_store' => 'required',
            // 'image' => 'mimes:jpeg,jpg,png|max:100',
            'image.*'      => 'required|image',
        ];
    }
}
