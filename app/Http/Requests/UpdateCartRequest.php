<?php

namespace App\Http\Requests;

use App\Rules\StockAvailabilityForCart;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
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
        return [
            
            'cart' => [new StockAvailabilityForCart()],
        ];
    }
    public function messages(){
        return [
            'cart.stock_availability_for_cart' => 'The quantity in the cart exceeds the available stock for one or more products.'
        ];
    }
}
