<?php

namespace ApiArchitect\Events\Log;

use ApiArchitect\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/**
 * Class RequestLogEvent
 *
 * @package ApiArchitect\Events
 * @author James Kirkby <hello@jameskirkby.com>
 */
class RequestLogEvent extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
