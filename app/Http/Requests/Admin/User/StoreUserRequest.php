<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'min:3',
                'max:55',
            ],
            'avatar' => [
                'mimes:tiff,jpg,bmp,png',
                'file',
                'max:5120'
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users'),
            ],
            'address' => [
                'max:120'
            ],
            'phone' => [
                'required',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                'min:11',
                'max:13'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
            ],
            'city_id' => [
                'required',
                'string'
            ],
            'role_id' => [
                'required',
                'string'
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'This field is required!',
            'name.min' => 'The name must be at least 3 characters long!',
            'name.max' => 'The name must be no more than 55 characters long!',
            'avatar.mimes' => 'Photo must be tiff, jpg, bmp or png type only!',
            'avatar.max' => 'The photo must not be greater than 5120 kilobytes!',
            'email.required' => 'This field is required!',
            'email.email' => 'Incorrect email address!',
            'email.unique' => 'Email already exists!',
            'phone.required' => 'This field is required!',
            'phone.regex' => 'Incorrect phone number!',
            'password.required' => 'This field is required!',
            'password.min' => 'The password must be at least 8 characters long!',
        ];
    }
}
