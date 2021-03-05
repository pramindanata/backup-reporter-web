<?php

namespace App\Http\Requests;

use App\Enums\TableName;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccessTokenUpdate extends FormRequest
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
        $accessTokenId = $this->route('access_token');

        return [
            //
            'name' => [
                'required',
                'string',
                Rule::unique(TableName::AccessToken, 'name')->ignore($accessTokenId)
            ]
        ];
    }
}
