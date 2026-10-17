<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'bail|required|string|max:255|unique:posts,title',
            'body' => 'required|string',
            'author' => 'required|string|max:255',
            'is_published' => 'boolean',
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'The field is required.',
            'body.required' => 'The field is required.',
            'author.required' => 'The field is required.',
            'is_published.boolean' => 'The field must be a boolean.',
        ];
    }
}
