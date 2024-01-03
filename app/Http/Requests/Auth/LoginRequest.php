<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'phone' => ['required', 'string']
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'phone' => $this->clearPhone($this->input('phone'))
        ]);
    }

    private function clearPhone(string $phone): array|string|null
    {
        return preg_replace('/[^0-9]+/', '', $phone);
    }
}
