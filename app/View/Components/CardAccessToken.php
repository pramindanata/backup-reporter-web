<?php

namespace App\View\Components;

use App\Models\AccessToken;
use Illuminate\View\Component;

class CardAccessToken extends Component
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
        return view('components.card-access-token');
    }

    public function getActivationStatusTextColorClass()
    {
        if ($this->accessToken->isActivated()) {
            return 'text-success';
        }

        return 'text-danger';
    }
}
