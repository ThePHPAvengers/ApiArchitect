<?php

namespace Api\Controllers;

use Dingo\Api\Facade\API;
use Dingo\Api\Http\Response;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use ApiArchitect\Abstracts\ControllerAbstract;
use Illuminate\Support\Collection;

/**
 * Class ApiController
 * @package Api\Controllers
 */
class ApiController extends ControllerAbstract
{

    use Helpers;

    /**
     * @var
     */
    protected $repository;

    /**
     * @var
     */
    protected $transformer;
}