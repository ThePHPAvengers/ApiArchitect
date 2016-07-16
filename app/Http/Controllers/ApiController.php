<?php

namespace Api\Controllers;

use Dingo\Api\Facade\API;
use Dingo\Api\Http\Response;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use ApiArchitect\Abstracts\ControllerAbstract;
use League\Fractal\Resource\Collection;


/**
 * Class ApiController
 *
 * @package Api\Controllers
 * @author James Kirkby <hello@jameskirkby.com>
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

    /**
     * @param $object
     * @return mixed
     */
    public function makeCollection($object)
    {
        return $this->collection(Collection::make($object),$this->transformer);
    }

    /**
     * @param $object
     * @return mixed
     */
    public function makeItem($object)
    {
        return $this->item($object,$this->transformer);
    }

    /**
     * @param Response $response
     * @return Response
     */
    public function sendResponse(Response $response)
    {
        return Response::makeFromExisting($response);
    }
}