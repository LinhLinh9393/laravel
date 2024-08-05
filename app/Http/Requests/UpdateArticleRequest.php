<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
            'tins' => 'array',
            'tins.*' => 'array|required_array_keys:title,desc,tac_gia,content',
            'tins.*.title' => 'required|unique:tins,title',
            'tins.*.desc' => 'required|unique:tins,desc',
            'tins.*.tac_gia' => 'required|unique:tins,tac_gia',
            'tins.*.image' => 'nullable|image|max:2048',
            'tins.*.content' => 'required|unique:tins,content',
            'tins.id_categories' => 'required',

        ];
    }
}
