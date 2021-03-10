<?php
namespace App\DTO;

use App\Models\AccessToken;

class AccessTokenDTO extends BaseDTO
{
    protected array $data;

    public function __construct(AccessToken $accessToken)
    {
        $telegramAccount = $accessToken->telegramAccount;

        $this->data = [
            'id' => (string) $accessToken->id,
            'name' => $accessToken->name,
            'value' => $accessToken->value,
            'shortValue' => $accessToken->short_value,
            'createdAt' => $accessToken->created_at->toISOString(),
            'updatedAt' => $accessToken->updated_at->toISOString(),
            'telegramAccount' => !isset($telegramAccount) ? null : [
                'id' => (string) $telegramAccount->id,
                'accountId' => $telegramAccount->account_id,
                'username' => $telegramAccount->username,
                'firstName' => $telegramAccount->first_name,
                'createdAt' => $telegramAccount->created_at->toISOString(),
                'updatedAt' => $telegramAccount->updated_at->toISOString(),
            ]
        ];
    }
}
