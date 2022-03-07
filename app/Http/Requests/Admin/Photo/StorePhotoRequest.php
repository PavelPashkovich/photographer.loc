<?php

namespace App\Http\Requests\Admin\Photo;

use Illuminate\Foundation\Http\FormRequest;

class StorePhotoRequest extends FormRequest
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
            'photo' => [
                'required',
                'mimes:tiff,jpg,bmp,png',
                'file',
                'max:5120'
            ],
            'category_id' => [
                'required',
                'string'
            ],
            'user_id' => [
                'required',
                'exists:users,id'
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'This field is required!',
            'name.min' => 'The name must be at least 3 characters long!',
            'name.max' => 'The name must be no more than 55 characters long!',
            'photo.required' => 'This field is required!',
            'photo.mimes' => 'Photo must be tiff, jpg, bmp or png type only!',
            'photo.max' => 'The photo must not be greater than 5120 kilobytes.',

        ];
    }

}
