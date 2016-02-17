<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
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
        $rules = [
            'title' => 'required|min:3|unique:articles',
            'slug' => 'required|min:1|unique:articles',
            'body' => 'required',
            'published_at' => 'required|date',
            'tag_list' => 'required',
        ];

        if ($this->isMethod('patch')) {
            $rules['title'] = 'required|min:3|unique:articles,title,'.$this->route('articles');
            $rules['slug'] = 'required|min:1|unique:articles,slug,'.$this->route('articles');
        }

        return $rules;
    }
}
