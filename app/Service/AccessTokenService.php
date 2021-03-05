<?php
namespace App\Service;

use App\Enums\AccessTokenActivationStatus;
use App\Models\AccessToken;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class AccessTokenService
{
    public function getCatalogPaginator(array $filter): LengthAwarePaginator
    {
        return AccessToken::select('id', 'name', 'short_value', 'activation_status', 'created_at')
            ->when($filter['search'] !== '', function (Builder $builder) use ($filter) {
                $search = $filter['search'];

                return $builder->where('id', 'ilike', "{$search}%")
                    ->orWhere('name', 'ilike', "{$search}%")
                    ->orWhere('value', 'ilike', "{$search}%")
                    ->orWhere('activation_status', 'ilike', "{$search}%")
                    ->orWhere('created_at', 'ilike', "{$search}%");
            })
            ->orderBy($filter['order'], $filter['sort'])
            ->paginate(15);
    }

    public function store(array $props): AccessToken
    {
        $token = AccessToken::generateToken();
        $accessToken = AccessToken::create([
            'name' => $props['name'],
            'value' => $token,
            'short_value' => substr($token, 0, AccessToken::SHORT_TOKEN_LENGTH),
            'activation_status' => AccessTokenActivationStatus::NotActivated,
        ]);

        return $accessToken;
    }

    public function getDetail($id): ?AccessToken
    {
        $accessToken = AccessToken::find($id);

        return $accessToken;
    }

    public function update(AccessToken $accessToken, array $props): AccessToken
    {
        $accessToken->name = $props['name'];
        $accessToken->save();

        return $accessToken;
    }

    public function delete(AccessToken $accessToken): ?bool
    {
        return $accessToken->delete();
    }
}
