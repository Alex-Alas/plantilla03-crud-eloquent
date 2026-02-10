<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        // Obtener ID del user desde la ruta
        $id = $this->route('user')->id;

        $ruleMode = $this->isMethod('patch') ? 'sometimes' : 'required';

        return [
            'name' => "{$ruleMode}|string|max:255",
            'lastname' => "{$ruleMode}|string|max:255",
            'username' => [
                $ruleMode,
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore($id)
            ],
            'email' => [
                $ruleMode,
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($id)
            ],
            'hiring_date' => 'nullable|date',
            'dui' => [
                $ruleMode,
                'string',
                'regex:/^\d{8}-\d{1}$/',
                Rule::unique('users', 'dui')->ignore($id)
            ],
            'phone_number' => 'nullable|string|regex:/^[0-9+]+$/',
            'birth_date' => "{$ruleMode}|date|before:today",
        ];
    }
}
