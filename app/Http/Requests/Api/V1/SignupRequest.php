<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:128'],
            'email' => ['required', 'email', 'max:128', 'unique:users,email'],
            'password' => ['required', 'string', 'max:255'],
            'verified' => ['required', 'boolean'],
            'profile_picture' => ['sometimes', 'string']
        ];
    }

    /**
     * Custom messages response when validation error
     */
    public function messages(): array
    {
        return [
            'email.unique' => 'This email is already registered.',
        ];
    }

    // Prepare value field for validation
    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => trim($this->name),
            'email' => strtolower(trim($this->email)),

        ]);
    }
}
