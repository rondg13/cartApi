<?php

namespace App\Http\Requests\Api\V1\Carts;

use Illuminate\Foundation\Http\FormRequest;

class PutApiV1CartsRequest extends FormRequest
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
            'storeId' => 'required|integer',
            'currency' => 'required|string',
            'products' => 'nullable|array',
            'products.*.id' => 'nullable',
            'products.*.variantId' => 'nullable',
            'products.*.quantity' => 'nullable',
            'products.*.tbyb' => 'nullable',
            'products.*.price' => 'nullable',
            'products.*.originalPrice' => 'nullable',
            'products.*.thumbnail' => 'nullable',
            'products.*.url' => 'nullable',
            'products.*.weight' => 'nullable',
            'products.*.options' => 'nullable'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'storeId.required' => 'This field is required',
            'currency.required' => 'A currency type is required'
        ];
    }
}
