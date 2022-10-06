<?php

namespace App\Domains\Posts\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'user_id'     => 'sometimes|required|numeric|exists:users,id',
            'title'       => 'required|string|max:255',
            'description' => 'required|string'
        ];
    }
}
