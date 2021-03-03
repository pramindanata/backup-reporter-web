<?php
namespace App\Service;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function getCatalogPaginator(): LengthAwarePaginator
    {
        return User::paginate(15);
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
