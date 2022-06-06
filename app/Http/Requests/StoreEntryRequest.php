<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'family_name'      => ['required', 'string', 'min:4'],
            'address'          => ['required', 'string', 'min:5'],
            'category_id'      => ['required', 'numeric', 'exists:categories,id'],
            'financial_id'     => ['required', 'numeric', 'exists:financials,id'],
            'status_id'        => ['required', 'numeric', 'exists:statuses,id'],
            'phone_num'        => ['required', 'numeric', 'digits:10'],
            'diwan_num'        => ['required', 'numeric'],
            'smartCard_num'    => ['required', 'numeric', 'digits:7'],
            'registration_num' => ['required', 'numeric'],
            'family_num'       => ['required', 'min:0', 'max:200'],
            'salary_charity'   => ['numeric']
        ];
    }
}
