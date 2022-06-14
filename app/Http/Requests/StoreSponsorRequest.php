<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;

class StoreSponsorRequest extends FormRequest
{
    /**user_id
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
            'address' => ['string', 'required', 'main:5'],
            '' => ['required', 'numeric', 'exists:users,id'],
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'   => ['string', 'numeric', 'unique:users', 'nullable', 'digits:10'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
