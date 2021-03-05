<?php

namespace App\View\Components;

use App\Models\AccessToken;
use Illuminate\View\Component;

class AccessTokenCard extends Component
{
    public AccessToken $accessToken;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(AccessToken $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function render()
    {
        return view('components.access-token-card');
    }

    public function getActivationStatusTextColorClass()
    {
        if ($this->accessToken->isActivated()) {
            return 'text-success';
        }

        return 'text-danger';
    }
}
