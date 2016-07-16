<?php

namespace ApiArchitect\Listeners;

use ApiArchitect\Events\RequestLogEvent;
use ApiArchitect\Repositories\HttpLogRepository;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class RequestLogEventListener
 *
 * @package ApiArchitect\Listeners
 * @author James Kirkby <hello@jameskirkby.com>
 */
class RequestLogEventListener implements ShouldQueue
{

    use InteractsWithQueue,DispatchesJobs;

    /**
     * @var $requestLogEvent
     */
    public $requestEvent;

    /**
     * @var HttpLogRepository
     */
    public $repository;

    /**
     * RequestLogEventListener constructor.
     *
     * @param RequestLogEvent $requestLogEvent
     * @param HttpLogRepository $repo
     */
    public function __construct(RequestLogEvent $requestLogEvent,HttpLogRepository $repo)
    {
        $this->requestEvent = $requestLogEvent;

        $this->repository = $repo;
    }

    /**
     * Handle the event.
     *
     * @param RequestLogEvent $event
     */
    public function handle(RequestLogEvent $event)
    {
        $this->repository->createLog($event);
    }
}
