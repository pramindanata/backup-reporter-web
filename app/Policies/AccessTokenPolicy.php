<?php

namespace App\Policies;

use App\Models\AccessToken;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccessTokenPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
        return true;
    }

    public function viewValue(User $user, AccessToken $accessToken)
    {
        //
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AccessToken  $accessToken
     * @return mixed
     */
    public function view(User $user, AccessToken $accessToken)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AccessToken  $accessToken
     * @return mixed
     */
    public function update(User $user, AccessToken $accessToken)
    {
        //
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AccessToken  $accessToken
     * @return mixed
     */
    public function delete(User $user, AccessToken $accessToken)
    {
        //
        return $user->isAdmin();
    }
}
