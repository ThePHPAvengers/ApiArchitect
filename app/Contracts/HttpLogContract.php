<?php

namespace ApiArchitect\Contracts;

use Closure;
use Illuminate\Http\Request;

/**
 * Class HttpLogInterface
 *
 * @package ApiArchitect\Contracts
 * @author James Kirkby <hello@jameskirkby.com>
 */
interface HttpLogContract
{

    public function handle(Request $request, Closure $next);
}