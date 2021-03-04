<?php

namespace App\Http\Requests;

use App\Enums\TableName;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileUpdateInfo extends FormRequest
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
        $user = Auth::user();

        return [
            //
            'name' => 'required|string',
            'username' => [
                'required',
                'alpha_dash',
                Rule::unique(TableName::User, 'username')->ignore($user->id)
            ]
        ];
    }
}
