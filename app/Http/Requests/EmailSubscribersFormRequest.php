<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EmailSubscribersFormRequest extends Request
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
            'subject' => 'required|max:255|min:3',
            'from_name' => 'required',
            'message' => 'required|min:10',
        ];
    }
}
