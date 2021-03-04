<?php
namespace App\Service;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function getCatalogPaginator(array $filter): LengthAwarePaginator
    {
        return User::select('id', 'username', 'created_at', 'role')
            ->when($filter['search'] !== '', function (Builder $builder) use ($filter) {
                $search = $filter['search'];

                return $builder->where('id', 'ilike', "{$search}%")
                    ->orWhere('username', 'ilike', "{$search}%")
                    ->orWhere('name', 'ilike', "{$search}%")
                    ->orWhere('created_at', 'ilike', "{$search}%")
                    ->orWhere('role', 'ilike', "{$search}%");
            })
            ->orderBy($filter['order'], $filter['sort'])
            ->paginate(15);
    }

    public function store(array $props): User
    {
        $user = User::create([
            'name' => $props['name'],
            'username' => $props['username'],
            'password' => Hash::make($props['password']),
            'role' => UserRole::Viewer,
        ]);

        return $user;
    }

    public function getDetail($id): ?User
    {
        $user = User::find($id);

        return $user;
    }
}
