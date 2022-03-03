<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
        $id = is_object($this->category) ? $this->category->id : $this->category ?? null;
        return [
            'name' => [
                'required',
                'string',
                'max:55',
                'min:3',
                Rule::unique('categories', 'name')->ignore($id),
            ],
        ];

    }

    public function messages()
    {
        return [
            'name.required' => 'This field is required!',
            'name.string' => 'The name must contain words!',
            'name.unique' => 'This name already exists!',
            'name.max' => 'The name must be no more than 55 characters long!',
            'name.min' => 'The name must be at least 3 characters long!',
        ];
    }

}
