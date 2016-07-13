<?php

namespace ApiArchitect\Abstracts;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Class ControllerAbstract
 * @package ApiArchitect
 */
abstract class ControllerAbstract extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}