<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = Auth::user();
        return $user->checkTheAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'text' => 'required',
            'publish_at' => 'nullable|date'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'text.required' => 'A text is required',
            'publish_at.required' => 'A publish_at is required',
        ];
    }


}
