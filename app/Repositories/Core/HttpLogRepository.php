<?php

namespace ApiArchitect\Repositories\Core;

use ApiArchitect\Abstracts\Core\Repositories\RepositoryAbstract;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;
use ApiArchitect\Entities\HttpLog;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use Doctrine\ORM\ORMInvalidArgumentException;

/**
 * Class HttpLogRepository
 *
 * @package ApiArchitect\Repositories\HttpLogRepository
 * @author James Kirkby <hello@jameskirkby.com>
 */
class HttpLogRepository extends RepositoryAbstract
{

    /**
     * @param  $request
     * @return HttpLog
     */
    public function createLog($request)
    {
        $httpLog = new HttpLog();

        $httpLog->setRoute($request->fullUrl());
        $httpLog->setMethod($request->getMethod());
        $httpLog->setParams(http_build_query(Input::all()));
        $httpLog->setLogRef();

        $this->_em->persist($httpLog);
        $this->_em->flush();

        return $httpLog;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function create(array $data)
    {
        return false;
    }
//
//    /**
//     * @TODO convert from eloqant to doctrine
//     *
//     * @return mixed
//     * @deprecated apiKeys no longer used
//     */
//    public function apiKey()
//    {
//        return $this->hasOne(Config::get('apiguard.model'));
//    }
//
//    /**
//     * @TODO convert from eloqant to doctrine
//     *
//     * @param $apiKeyId
//     * @param $routeAction
//     * @param $method
//     * @param $keyIncrementTime
//     * @return mixed
//     */
//    public function countApiKeyRequests($apiKeyId, $routeAction, $method, $keyIncrementTime)
//    {
//        return self::where('api_key_id', '=', $apiKeyId)
//            ->where('route', '=', $routeAction)
//            ->where('method', '=', $method)
//            ->where('created_at', '>=', date('Y-m-d H:i:s', $keyIncrementTime))
//            ->where('created_at', '<=', date('Y-m-d H:i:s'))
//            ->count();
//    }
//
//    /**
//     * @TODO convert from eloqant to doctrine
//     *
//     * @param $routeAction
//     * @param $method
//     * @param $keyIncrementTime
//     * @return mixed
//     */
//    public function countMethodRequests($routeAction, $method, $keyIncrementTime)
//    {
//        return self::where('route', '=', $routeAction)
//            ->where('method', '=', $method)
//            ->where('created_at', '>=', date('Y-m-d H:i:s', $keyIncrementTime))
//            ->where('created_at', '<=', date('Y-m-d H:i:s'))
//            ->count();
//    }

    /**
     * @param int $id
     * @param array $updatedEntity
     * @return bool
     * @deprecated
     */
    public function update($id, array $updatedEntity)
    {
        return false;
    }

}