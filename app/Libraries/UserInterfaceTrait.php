<?php

namespace ApiArchitect\Libraries;

/**
 * Class UserInterfaceTrait
 * @package ApiArchitect\Libraries
 */
trait UserInterfaceTrait
{

    /**
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public function getBy($key, $value)
    {
        return $this->find($value);
    }
}