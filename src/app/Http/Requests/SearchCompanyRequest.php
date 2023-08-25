<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchCompanyRequest extends FormRequest
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
            'keyDate'   => 'nullable|in:created_at,updated_at',
            'startDate' => 'nullable|date',
            'endDate'   => 'nullable|date',
            'id'        => 'nullable|integer|min:1',
            'keyword'   => 'nullable|string|max:255',
            'sortField' => 'nullable|in:id,name,created_at',
            'sortType'  => 'nullable|in:asc,desc',
        ];
    }
}
