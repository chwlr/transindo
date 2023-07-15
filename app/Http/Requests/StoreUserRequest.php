<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', Password::min(8)->mixedCase()],
            'phoneNumber' => 'required|numeric',
            'driverLicense' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Sorry, This Email Address Is Already Used',
            'password.required' => 'Password is required',
            'PhoneNumber.required' => 'Phone Number is required',
            'driverLicense.required' => 'Driver License is required'
        ];
    }
}
