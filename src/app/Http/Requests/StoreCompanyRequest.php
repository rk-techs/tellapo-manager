<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'name'          => 'required|string|max:255',
            'postal_code'   => 'nullable|string|max:10',
            'address'       => 'nullable|string|max:500',
            'tel'           => 'nullable|string|max:20',
            'fax'           => 'nullable|string|max:20',
            'email'         => 'nullable|email|max:255',
            'website'       => 'nullable|url|max:255',
            'industry'      => 'nullable|string|max:255',
            'capital'       => 'nullable|string|max:255',
            'number_of_employees' => 'nullable|string|max:255',
            'annual_sales'        => 'nullable|string|max:255',
            'listed'              => 'nullable|string|max:255',
            'established_at'      => 'nullable|string|max:255',
            'corporate_number'    => 'nullable|string|max:255',
            'prospect_rating'     => 'nullable|integer|min:1|max:5',
            'employee_id'         => 'nullable|exists:employees,id'
        ];
    }

    public function messages()
    {
        return [
            'required'  => ':attribute は必須項目です',
            'email'     => ':attribute の形式が正しくありません',
            'url'       => ':attribute の形式が正しくありません',
            'integer'   => ':attribute は整数を入力してください',
            'min' => [
                'numeric' => ':attribute は:min以上の数字を入力してください',
                'string' => ':attribute は:min文字以上で入力してください'
            ],
            'max' => [
                'numeric' => ':attribute は:max以下の数字を入力してください',
                'string' => ':attribute は:max文字以内で入力してください'
            ],
            'exists' => '選択した :attribute は存在しません',
        ];
    }

    public function attributes()
    {
        return [
            'name'          => '会社名',
            'postal_code'   => '郵便番号',
            'address'       => '住所',
            'tel'           => '電話番号',
            'fax'           => 'FAX',
            'email'         => 'Email',
            'website'       => '会社URL',
            'industry'      => '業種',
            'capital'       => '資本金',
            'number_of_employees'   => '従業員数',
            'annual_sales'          => '年商',
            'listed'                => '上場しているか',
            'established_at'        => '設立日',
            'corporate_number'      => '法人番号',
            'prospect_rating'       => '見込み度',
            'employee_id'           => 'テレアポ担当者ID',
        ];
    }
}
