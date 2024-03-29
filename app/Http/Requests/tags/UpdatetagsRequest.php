<?php

namespace App\Http\Requests\tags;

use Illuminate\Foundation\Http\FormRequest;

class UpdatetagsRequest extends FormRequest
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
            'name' => 'required|max:20|unique:tags,name,' .$this->tag['id'],
            'slug' => 'required|max:20|unique:tags,slug,' .$this->tag['id']
        ];
    }
}
