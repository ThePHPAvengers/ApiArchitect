<?php

namespace Api\Middleware;

use Illuminate\Support\Facades\Event;
use ApiArchitect\Events\RequestLogEvent;
use Closure;
use Illuminate\Http\Request;
use ApiArchitect\Repositories\HttpLogRepository;

/**
 * Class HttpLog
 *
 * @package Api\Middleware
 * @author James Kirkby <hello@jameskirkby.com>
 */
class HttpLog
{

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
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $this->repository->createLog($request);

        return $next($request);
    }
}