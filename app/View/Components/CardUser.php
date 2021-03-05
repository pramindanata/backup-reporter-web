<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class CardUser extends Component
{
    public User $user;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('components.card-user');
    }

    public function getRoleTextColorClass()
    {
        if ($this->user->isAdmin()) {
            return 'text-purple';
        }

        return 'text-warning';
    }
}
