<?php

namespace App\Http\Requests\Main\User\Message;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
            'user-message' => 'string|max:255',
            'user_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'user-message.max' => 'Your message is too long! (255 characters max)'
        ];
    }
}
