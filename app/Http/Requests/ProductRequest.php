<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'sku' => 'required',
            'brand_id' => 'required',
            'in_stock' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'sku.required' => 'A sku is required',
            'brand_id.required' => 'A brand_id is required',
            'in_stock.required' => 'A in_stock is required',
            'description.required' => 'A description is required',
            'price.required' => 'A price is required',
            'category.required' => 'A category is required',
        ];
    }
}
