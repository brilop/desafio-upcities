<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
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
            'cpf' => 'required|string|size:11|unique:people,cpf',
            'birth_date' => 'required|date',
            'email' => 'required|email|unique:people,email',
            'phone' => 'required|string|max:20',
            'public_space' => 'required|string|max:255',
            'state' => 'required|string|max:2',
            'city' => 'required|string|max:255',
        ];
    }
}
