<?php

namespace ApiArchitect\Contracts\Core;

/**
 * Class SemanticContract
 *
 * @package ApiArchitect\Contracts
 */
interface SemanticContract
{

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @param $name
     * @return mixed
     */
    public function setName($name);

}