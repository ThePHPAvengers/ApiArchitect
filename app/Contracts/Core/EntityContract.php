<?php

namespace ApiArchitect\Contracts\Core;

/**
 * Interface EntityContract
 *
 * @package ApiArchitect\Contracts
 * @author James Kirkby <hello@jameskirkby.com>
 */
interface EntityContract
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getNid();

    /**
     * @param $nid
     * @return mixed
     */
    public function setNid($nid);
}