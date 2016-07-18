<?php

namespace ApiArchitect\Contracts\Log;

/**
 * Interface DoctrineLoggableContract
 *
 * @package ApiArchitect\Contracts
 * @author James Kirkby <hello@jameskirkby.com>
 */
interface DoctrineLogContract
{
    /**
     * @return mixed
     */
    public function getUsername();
}