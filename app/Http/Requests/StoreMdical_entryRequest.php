<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMdical_entryRequest extends FormRequest
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
            'name_recipient'   => ['required', 'string', 'min:4'],
            'notes'            => ['required', 'string', 'min:4'],
            'phone'            => ['required', 'numeric', 'digits:10'],
            'husband_name'     => ['required', 'string', 'min:4'],
            'wife_name'        => ['required', 'string', 'min:4'],
            'whos'             => ['required', 'string'],
            'birthday'         => ['required', 'date'],
            'illness'          => ['required', 'string'],
            'address'          => ['required', 'string'],
            'session_decision' => ['required', 'string']
        ];
    }
}
