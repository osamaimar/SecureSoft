<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'supplier' => 'required',
            'collection' => '',
            'regions' => 'required',
            'regions.*' => 'exists:regions,id',
            'devices' => 'required',
            'devices.*' => 'exists:devices,id',
            'cost' => 'required|numeric',
            'description' => 'required|string|max:600',
            'base_price' => 'required|numeric',
            'end_user_price' => 'required|numeric',
            'no_of_devices' => 'required|numeric',
            'duration_value' => 'required|numeric',
            'duration_time_unit' => 'required|string',
            'warranty' => 'required|string|max:255',
            'status' => 'required|boolean',
            'images' => 'required', 
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:3072',
            'default_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:3072',
        ];
    }
}
