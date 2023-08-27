<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCallRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // 'employee_id'   => 'required|integer|exists:employees,id',
            // 'called_at'     => 'required|date',
            'result' => 'required|integer',
            'receiver_info' => 'nullable|string|max:255',
            'notes'         => 'nullable|string',
        ];
    }
}
