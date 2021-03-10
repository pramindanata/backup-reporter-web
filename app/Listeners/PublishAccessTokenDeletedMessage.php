<?php

namespace App\Listeners;

use App\DTO\AccessTokenDTO;
use App\Enums\PubSubChannel;
use App\Events\AccessTokenDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Redis;

class PublishAccessTokenDeletedMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(AccessTokenDeleted $event)
    {
        //
        $accessToken = $event->accessToken;
        $accessTokenDTO = new AccessTokenDTO($accessToken);

        Redis::publish(PubSubChannel::AccessTokenDeleted, $accessTokenDTO->toJSON());
    }
}
