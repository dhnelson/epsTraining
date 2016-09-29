<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostFormRequest extends Request
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
            'author'         => 'required|max:255',
            'title'          => 'required|max:255',
            'slug'           => 'required|alpha_dash|max:255|min:5|unique:posts,slug',
            'body'           => 'required',
            'category'       => 'required|integer',
            'featured_image' => 'sometimes|image'
        ];
    }
}
