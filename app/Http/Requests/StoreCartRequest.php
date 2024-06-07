<?php

namespace App\Http\Requests;

use App\Rules\StockAvailability;
use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $product = $this->route('product');
        return [
            'quantity' => [
                'required',
                'integer',
                'min:1',
                new StockAvailability($product)
            ],
            'terms_checkbox' => 'accepted',
            'region-checkbox' => 'accepted',
        ];
    }
    public function messages()
    {
        return [
            'quantity.required' => 'Quantity is required.',
            'quantity.integer' => 'Quantity must be an integer.',
            'quantity.min' => 'Quantity must be at least 1.',
            'terms-checkbox.required' => 'You must accept the terms and conditions.',
            'terms-checkbox.accepted' => 'acceptedYou must accept the terms and conditions.',
            'region-checkbox.required' => 'You must confirm the region.',
            'region-checkbox.accepted' => 'acceptedYou must confirm the region.',
        ];
    }
}
