<?php
namespace App\Service;

use App\Models\AccessToken;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class AccessTokenService
{
    public function getCatalogPaginator(array $filter): LengthAwarePaginator
    {
        return AccessToken::select('id', 'name', 'short_access_token', 'activation_status', 'created_at')
            ->when($filter['search'] !== '', function (Builder $builder) use ($filter) {
                $search = $filter['search'];

                return $builder->where('id', 'ilike', "{$search}%")
                    ->orWhere('name', 'ilike', "{$search}%")
                    ->orWhere('access_token', 'ilike', "{$search}%")
                    ->orWhere('activation_status', 'ilike', "{$search}%")
                    ->orWhere('created_at', 'ilike', "{$search}%");
            })
            ->orderBy($filter['order'], $filter['sort'])
            ->paginate(15);
    }
}
