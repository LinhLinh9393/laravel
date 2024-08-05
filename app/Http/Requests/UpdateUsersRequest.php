<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersRequest extends FormRequest
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
            'users' => 'array',
            'users.*' => 'array|required_array_keys:name,email,password',
            'users.*.name' => 'required|unique:users,name',
            'users.*.email' => 'required|email|unique:uses,email',
            'users.*.password' => 'required|unique:users,password',
        ];
    }
}