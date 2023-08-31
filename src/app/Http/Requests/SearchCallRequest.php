<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchCallRequest extends FormRequest
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
            'employee_id'   => 'nullable|exists:employees,id',
            'result'    => 'nullable|integer',
            'keyword'   => 'nullable|string|max:255',
            'sortField' => 'nullable|in:called_at',
            'sortType'  => 'nullable|in:asc,desc',
        ];
    }
}
