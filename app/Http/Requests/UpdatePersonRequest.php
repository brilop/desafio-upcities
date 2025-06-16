<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'cpf' => [
                'required',
                'string',
                'size:11',
                Rule::unique('people', 'cpf')->ignore($this->route('id'))
            ],
            'birth_date' => 'required|date',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('people', 'email')->ignore($this->route('id'))
            ],
            'phone' => 'required|string|max:20',
            'public_space' => 'required|string|max:255',
            'state' => 'required|string|max:2',
            'city' => 'required|string|max:255',
        ];
    }
}
