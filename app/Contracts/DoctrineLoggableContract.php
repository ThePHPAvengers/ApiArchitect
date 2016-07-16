<?php

namespace ApiArchitect\Contracts;

/**
 * Interface DoctrineLoggableContract
 *
 * @package ApiArchitect\Contracts
 * @author James Kirkby <hello@jameskirkby.com>
 */
interface DoctrineLoggableContract
{
    /**
     * @return mixed
     */
    public function getUsername();
}