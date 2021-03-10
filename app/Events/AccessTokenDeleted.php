<?php

namespace App\Events;

use App\Models\AccessToken;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AccessTokenDeleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public AccessToken $accessToken;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(AccessToken $accessToken)
    {
        //
        $this->accessToken = $accessToken;
    }
}
