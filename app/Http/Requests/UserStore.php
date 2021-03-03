<?php

namespace App\Http\Requests;

use App\Enums\TableName;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStore extends FormRequest
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
            'name' => 'string|required',
            'username' => [
            'alpha_dash',
                'required',

                Rule::unique(TableName::User, 'username')
            ],
            'password' => 'required|string|min:8',
        ];
    }
}
