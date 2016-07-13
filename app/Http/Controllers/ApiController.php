<?php

namespace Api\Controllers;

use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use ApiArchitect\Abstracts\ControllerAbstract;

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