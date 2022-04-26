<?php

namespace App\Http\Requests\Main\Photo\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'comment' => 'string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'comment.max' => 'Your comment is too long! (255 characters max)'
        ];
    }
}
