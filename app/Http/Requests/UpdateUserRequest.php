<?php

namespace App\Http\Requests;

use App\helpers\ApiResponse;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:30'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(auth()->user())],
            'username' => ['required', 'min:3', 'max:15'],
            'avatar' => ['required','image','max:500000'],
            'user_type_id'=>['required'],
            'old_password' => ['sometimes', 'required', 'min:8'],
            'new_password' => ['sometimes', 'required', 'min:8', 'different:old_password'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        return ApiResponse::failedValidation($validator);

    }
}
