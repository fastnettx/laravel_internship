<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasketRequest extends FormRequest
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
            'payment' => 'required|regex:/[1-4]/i',
            'adress' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'payment.required' => 'A payment value 1,2,3,4',
            'adress.required' => 'A adress is required',
        ];
    }
}
