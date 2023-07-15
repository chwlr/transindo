<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'brand' => 'required',
            'model' => 'required',
            'numberPlate' => 'required',
            'rates' => 'required|numeric',
            'availability' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'brand.required' => 'Brand is required',
            'model.required' => 'Model is required',
            'numberPlate.unique' => 'Number Plate is required',
            'rates.required' => 'Rates is required',
            'availability.required' => 'Availability is required',
        ];
    }
}
