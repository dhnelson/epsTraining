<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\Post;

class UpdateFormRequest extends Request
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
            'author'      => 'required|max:255',
            'title'       => 'required|max:255',
            'slug'        => 'required|alpha_dash|max:255|min:1|unique:posts,slug,' . $this->posts,
            'body'        => 'required',
            'category_id' => 'required|integer'
        ];
    }
}
