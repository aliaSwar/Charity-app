<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdateSponsorRequest extends FormRequest
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
            'address' => ['string', 'required', 'min:5'],
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'string', 'email', 'max:255'],
            'phone'   => ['string', 'nullable', new PhoneNumber()],
            'password' => ['string'],
        ];
    }
    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate($user, $pass)
    {

        if ($user->email == $this->email and $user->phone == $this->phone) {

            $user->update([
                'name' => $this->name,
                'password' => Hash::make($pass),
            ]);
        } elseif ($user->phone == $this->phone) {
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($pass),
            ]);
        } elseif ($user->email == $this->email) {
            $user->update([
                'name' => $this->name,
                'phone' => $this->phone,
                'password' => Hash::make($pass),
            ]);
        } else {
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone'  => $this->phone,
                'password' => Hash::make($pass),
            ]);
        }
    }
}
