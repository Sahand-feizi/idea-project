<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Auth;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateProfileRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', function ($attribute, $value, $fail) {
                if ($value !== Auth::user()->email) {
                    $fail('The provided email does not match your current email.');
                }
            }],
            'new_email' => ['nullable', 'email', 'unique:users', 'max:255'],
            'password' => ['required', 'current_password', Password::default()],
            'new_password' => ['nullable', Password::default()],
        ];
    }
}
