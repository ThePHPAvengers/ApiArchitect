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
     */
    public function prePersist();

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate();
}