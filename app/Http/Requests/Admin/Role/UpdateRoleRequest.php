<?php

namespace App\Http\Requests\Admin\Role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
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
        $id = is_object($this->role) ? $this->role->id : $this->role ?? null;
        return [
            'name' => [
                'required',
                'string',
                'max:55',
                'min:2',
                Rule::unique('roles')->ignore($id),
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
            'name.min' => 'The name must be at least 2 characters long!',
        ];
    }
}
