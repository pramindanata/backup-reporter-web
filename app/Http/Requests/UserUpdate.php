<?php

namespace App\Http\Requests;

use App\Enums\TableName;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdate extends FormRequest
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
        $userId = $this->route('user');

        return [
            'name' => 'string|required',
            'username' => [
            'alpha_dash',
                'required',
                Rule::unique(TableName::User, 'username')->ignore($userId)
            ],
            'password' => 'nullable|string|min:8',
        ];
    }
}
