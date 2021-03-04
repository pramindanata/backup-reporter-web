<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class ProfileUpdatePassword extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function withValidator(Validator $validator)
    {
        $user = Auth::user();

        $validator->after(function (Validator $validator) use ($user) {
            $input = $this->request->get('current_password');

            if (!Hash::check($input, $user->password)) {
                $validator->errors()->add('current_password', 'The provided password does not match your current password.');
            }
        });
    }
}
