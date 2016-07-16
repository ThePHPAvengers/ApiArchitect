<?php

namespace ApiArchitect\Exceptions;

/**
 * Class ApiException
 *
 * @package ApiArchitect\Exceptions
 * @author James Kirkby <hello@jameskirkby.com>
 */
class ApiException extends \Exception
{
    /**
     * @param \Exception $e
     */
    public function render(\Exception $e){}
}