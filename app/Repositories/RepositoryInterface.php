<?php

namespace ApiArchitect\Repositories;

/**
 * Interface RepositoryInterface
 * @package ApiArchitect\Repositories
 */
interface RepositoryInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

}