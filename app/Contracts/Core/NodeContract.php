<?php

namespace ApiArchitect\Contracts\Core;

/**
 * Interface NodeContract
 *
 * @package ApiArchitect\Entities
 * @author James Kirkby <hello@jameskirkby.com>
 */
interface NodeContract
{

    /**
     * @ORM\PrePersist
     * @param $event
     * @return
     */
    public function prePersist($event);

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate();
}