<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BackupReportLogCatalog extends FormRequest
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
            //
            'search' => 'string|nullable',
            'order' => [
                'string',
                'nullable',
                Rule::in(['project_name', 'db_name', 'created_at', 'ip'])
            ],
            'sort' => [
                'string',
                'nullable',
                Rule::in(['ASC', 'DESC'])
            ]
        ];
    }
}
