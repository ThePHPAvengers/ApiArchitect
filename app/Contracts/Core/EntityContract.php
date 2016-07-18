<?php

namespace ApiArchitect\Contracts\Core;

use ApiArchitect\Contracts\Core\NodeContract;

/**
 * Interface EntityContract
 *
 * @package ApiArchitect\Contracts
 * @author James Kirkby <hello@jameskirkby.com>
 */
interface EntityContract extends NodeContract
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