<?php

namespace App\Http\Requests\Frontend;

use App\Http\Requests\Request;

class CommentRequest extends Request
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
        switch ($this->method()) {
            case 'POST':
                return [
                        'body' => 'required|min:10|max:1000',
                        'users_id' => 'required|exists:users,id|numeric',
                        'foods_id' => 'required|exists:foods,id|numeric'
                    ];
            default:
                return [];
        }
    }
    /**
     * Get the error messages for the password confirmation.
     *
     * @return array
     */
    public function messages()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'body.required'  => trans('lang_user.comments.required'),
                    'body.min'       => trans('lang_user.comments.min'),
                    'body.max'       => trans('lang_user.comments.max'),
                ];
            default:
                return [];
        }
    }
}
