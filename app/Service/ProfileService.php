<?php
namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileService
{
    public function updateInfo(User $user, array $props): User
    {
        $user->name = $props['name'];
        $user->username = $props['username'];

        $user->save();

        return $user;
    }

    public function updatePassword(User $user, string $password): User
    {
        $user->password = Hash::make($password);

        $user->save();

        return $user;
    }
}
