<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingsRequest extends FormRequest
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
            'light_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dark_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'light_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dark_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
