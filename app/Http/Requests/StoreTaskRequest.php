<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,is_canceled,completed',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Görev adı alanı zorunludur.',
            'name.string' => 'Görev adı yalnızca metin olmalıdır.',
            'name.max' => 'Görev adı en fazla 255 karakter olabilir.',
            'description.string' => 'Açıklama yalnızca metin olmalıdır.',
            'status.required' => 'Durum alanı zorunludur.',
            'status.in' => 'Geçerli bir durum seçmelisiniz: pending, in_progress, is_canceled veya completed.',
        ];
    }
}
