<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:200'],
            'email' => [
                'required',
                'string',
                'email',
                'max:200',
                Rule::unique('contacts', 'email')->ignore($this->route('contact')),
            ],
            'phone' => [
                'required',
                'string',
                'max:20',
                Rule::unique('contacts', 'phone')->ignore($this->route('contact')),
            ],
            'address' => ['required', 'string', 'max:200'],
        ];

    }
}
